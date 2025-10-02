<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TamSamSomController extends Controller
{
    public function index()
    {
        // For demo purposes, return empty array
        $tamSamSoms = [];
        return view('tam-sam-som.index', compact('tamSamSoms'));
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
                'tam_value' => 'required|numeric|min:0',
                'sam_description' => 'required|string',
                'sam_value' => 'required|numeric|min:0',
                'som_description' => 'required|string',
                'som_value' => 'required|numeric|min:0',
                'market_assumptions' => 'nullable|array',
                'growth_projections' => 'nullable|array',
            ]);

            // For demo purposes, just redirect with success message
            // In real implementation, you would save to database
            
            return redirect()->route('tam-sam-som.create')
                ->with('success', 'TAM SAM SOM berhasil dibuat! Data: ' . $request->business_name);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@store: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data TAM SAM SOM.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID TAM SAM SOM tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'TAM SAM SOM tidak ditemukan.');
            }

            return view('tam-sam-som.show', compact('tamSamSom'));
            
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@show: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.index')
                ->with('error', 'Terjadi kesalahan saat memuat data TAM SAM SOM.');
        }
    }

    public function edit($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID TAM SAM SOM tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'TAM SAM SOM tidak ditemukan.');
            }

            return view('tam-sam-som.edit', compact('tamSamSom'));
            
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@edit: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.index')
                ->with('error', 'Terjadi kesalahan saat memuat data TAM SAM SOM.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID TAM SAM SOM tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'TAM SAM SOM tidak ditemukan.');
            }

            $request->validate([
                'business_name' => 'required|string|max:255',
                'owner_name' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'tam_description' => 'required|string',
                'tam_value' => 'required|numeric|min:0',
                'sam_description' => 'required|string',
                'sam_value' => 'required|numeric|min:0',
                'som_description' => 'required|string',
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
                'tam_value' => $request->tam_value,
                'sam_description' => $request->sam_description,
                'sam_value' => $request->sam_value,
                'som_description' => $request->som_description,
                'som_value' => $request->som_value,
                'market_assumptions' => $request->market_assumptions ?? [],
                'growth_projections' => $request->growth_projections ?? [],
            ]);

            return redirect()->route('tam-sam-som.show', $tamSamSom->id)
                ->with('success', 'TAM SAM SOM berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@update: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data TAM SAM SOM.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'ID TAM SAM SOM tidak valid.');
            }

            $tamSamSom = TamSamSom::find($id);
            
            if (!$tamSamSom) {
                return redirect()->route('tam-sam-som.index')
                    ->with('error', 'TAM SAM SOM tidak ditemukan.');
            }

            $tamSamSom->delete();

            return redirect()->route('tam-sam-som.index')
                ->with('success', 'TAM SAM SOM berhasil dihapus!');
                
        } catch (\Exception $e) {
            Log::error('Error in TamSamSomController@destroy: ' . $e->getMessage());
            return redirect()->route('tam-sam-som.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data TAM SAM SOM.');
        }
    }
}
