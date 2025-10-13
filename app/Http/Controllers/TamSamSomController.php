<?php

namespace App\Http\Controllers;

use App\Models\TamSamSom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TamSamSomController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = TamSamSom::query();
            
            // Search functionality
            if ($request->has('search') && $request->search) {
                $query->search($request->search);
            }
            
            $tamSamSoms = $query->latest()->paginate(10);
            
            return view('tam-sam-som.index', compact('tamSamSoms'));
            
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@index: ' . $e->getMessage());
            return view('tam-sam-som.index', ['tamSamSoms' => collect()]);
        }
    }

    public function create()
    {
        return view('tam-sam-som.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'business_name' => 'required|string|max:255',
                'owner_name' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'tam_description' => 'required|string',
                'tam_market_size_raw' => 'required|numeric|min:1',
                'tam_unit_value' => 'required|numeric|min:0',
                'tam_value' => 'required|numeric|min:0',
                'sam_description' => 'required|string',
                'sam_percentage' => 'required|numeric|min:0|max:100',
                'sam_market_size' => 'required|numeric|min:0',
                'sam_value' => 'required|numeric|min:0',
                'som_description' => 'required|string',
                'som_percentage' => 'required|numeric|min:0|max:100',
                'som_market_size' => 'required|numeric|min:0',
                'som_value' => 'required|numeric|min:0',
                'market_assumptions' => 'nullable|array',
                'growth_projections' => 'nullable|array',
            ]);

            // Create Market Validation record in database
            $tamSamSom = TamSamSom::create([
                'business_name' => $request->business_name,
                'owner_name' => $request->owner_name,
                'industry' => $request->industry,
                'location' => $request->location,
                'tam_description' => $request->tam_description,
                'tam_market_size' => $request->tam_market_size_raw,
                'tam_unit_value' => $request->tam_unit_value,
                'tam_value' => $request->tam_value,
                'sam_description' => $request->sam_description,
                'sam_percentage' => $request->sam_percentage,
                'sam_market_size' => $request->sam_market_size,
                'sam_value' => $request->sam_value,
                'som_description' => $request->som_description,
                'som_percentage' => $request->som_percentage,
                'som_market_size' => $request->som_market_size,
                'som_value' => $request->som_value,
                'market_assumptions' => array_filter($request->market_assumptions ?? []),
                'growth_projections' => array_filter($request->growth_projections ?? []),
            ]);

            // Store ID in session for show page
            session(['current_tam_sam_som_id' => $tamSamSom->id]);
            
            // Calculate summary for success message
            $tamValue = number_format($request->tam_value, 0, ',', '.');
            $samValue = number_format($request->sam_value, 0, ',', '.');
            $somValue = number_format($request->som_value, 0, ',', '.');
            
            $summary = "Market Validation berhasil dibuat untuk {$request->business_name}! " .
                      "TAM: Rp {$tamValue} | SAM: Rp {$samValue} ({$request->sam_percentage}%) | SOM: Rp {$somValue} ({$request->som_percentage}%)";
            
            return redirect()->route('tam-sam-som.show', $tamSamSom->id)
                ->with('success', $summary);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@store: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data Market Validation.')
                ->withInput();
        }
    }

    public function show($id = null)
    {
        try {
            // If no ID provided, get from session
            if (!$id) {
                $id = session('current_tam_sam_som_id');
            }
            
            if (!$id) {
                return redirect()->route('tam-sam-som.create')
                    ->with('error', 'Data Market Validation tidak ditemukan. Silakan buat Market Validation terlebih dahulu.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.create')
                    ->with('error', 'Data Market Validation tidak ditemukan.');
            }

            // Convert to array format for compatibility with existing view
            $data = $tamSamSom->toArray();
            
            // Ensure ID is included in data
            $data['id'] = $tamSamSom->id;

            return view('tam-sam-som.show', compact('data'));
            
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@show: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.create')
                ->with('error', 'Terjadi kesalahan saat memuat data Market Validation.');
        }
    }

    public function edit($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID Market Validation tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'Market Validation tidak ditemukan.');
            }

            return view('tam-sam-som.edit', compact('tamSamSom'));
            
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@edit: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.index')
                ->with('error', 'Terjadi kesalahan saat memuat data Market Validation.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID Market Validation tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'Market Validation tidak ditemukan.');
            }

            $request->validate([
                'business_name' => 'required|string|max:255',
                'owner_name' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'tam_description' => 'required|string',
                'tam_market_size_raw' => 'required|numeric|min:1',
                'tam_unit_value' => 'required|numeric|min:0',
                'tam_value' => 'required|numeric|min:0',
                'sam_description' => 'required|string',
                'sam_percentage' => 'required|numeric|min:0|max:100',
                'sam_market_size' => 'required|numeric|min:0',
                'sam_value' => 'required|numeric|min:0',
                'som_description' => 'required|string',
                'som_percentage' => 'required|numeric|min:0|max:100',
                'som_market_size' => 'required|numeric|min:0',
                'som_value' => 'required|numeric|min:0',
                'market_assumptions' => 'nullable|array',
                'growth_projections' => 'nullable|array',
            ]);

            $tamSamSom->update([
                'business_name' => $request->business_name,
                'owner_name' => $request->owner_name,
                'industry' => $request->industry,
                'location' => $request->location,
                'tam_description' => $request->tam_description,
                'tam_market_size' => $request->tam_market_size_raw,
                'tam_unit_value' => $request->tam_unit_value,
                'tam_value' => $request->tam_value,
                'sam_description' => $request->sam_description,
                'sam_percentage' => $request->sam_percentage,
                'sam_market_size' => $request->sam_market_size,
                'sam_value' => $request->sam_value,
                'som_description' => $request->som_description,
                'som_percentage' => $request->som_percentage,
                'som_market_size' => $request->som_market_size,
                'som_value' => $request->som_value,
                'market_assumptions' => array_filter($request->market_assumptions ?? []),
                'growth_projections' => array_filter($request->growth_projections ?? []),
            ]);

            return redirect()->route('tam-sam-som.show', $tamSamSom->id)
                ->with('success', 'Market Validation berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@update: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data Market Validation.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID Market Validation tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'Market Validation tidak ditemukan.');
            }

            $businessName = $tamSamSom->business_name;
            $tamSamSom->delete();

            return redirect()->route('tam-sam-som.index')
                ->with('success', "Market Validation '{$businessName}' berhasil dihapus!");
                
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@destroy: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data Market Validation.');
        }
    }

    public function download(Request $request)
    {
        try {
            $format = $request->get('format', 'pdf');
            $id = $request->get('id') ?? session('current_tam_sam_som_id');
            
            // Debug logging
            Log::info('Download request - Format: ' . $format . ', ID: ' . $id);
            
            if (!$id) {
                Log::warning('Download failed - No ID provided');
                return redirect()->route('tam-sam-som.create')
                    ->with('error', 'Data Market Validation tidak ditemukan. Silakan buat Market Validation terlebih dahulu.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                Log::warning('Download failed - Market Validation not found for ID: ' . $id);
                return redirect()->route('tam-sam-som.create')
                    ->with('error', 'Data Market Validation tidak ditemukan.');
            }

            $data = $tamSamSom->toArray();
            Log::info('Download successful - Business: ' . $data['business_name']);

            if ($format === 'pdf') {
                return $this->downloadPDF($data);
            }

            return redirect()->route('tam-sam-som.show', $id)
                ->with('error', 'Format download tidak didukung.');
                
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@download: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.create')
                ->with('error', 'Terjadi kesalahan saat mendownload file: ' . $e->getMessage());
        }
    }

    private function downloadPDF($data)
    {
        // Return success response to trigger JavaScript PDF download
        return response()->json([
            'success' => true,
            'message' => 'PDF download initiated',
            'data' => $data
        ]);
    }
}
