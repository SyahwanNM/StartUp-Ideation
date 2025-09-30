<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BmcData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;

class BmcController extends Controller
{
    public function index()
    {
        return view('bmc.landing');
    }

    public function create()
    {
        return view('bmc.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'business_description' => 'required|string',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'customer_segments' => 'required|array',
            'value_propositions' => 'required|array',
            'channels' => 'required|array',
            'customer_relationships' => 'required|array',
            'revenue_streams' => 'required|array',
            'key_resources' => 'required|array',
            'key_activities' => 'required|array',
            'key_partnerships' => 'required|array',
            'cost_structure' => 'required|array',
        ]);

        $business = Business::create($request->only([
            'owner_name',
            'business_name',
            'business_description',
            'location',
            'phone_number'
        ]));

        $business->bmcData()->create($request->only([
            'customer_segments',
            'value_propositions',
            'channels',
            'customer_relationships',
            'revenue_streams',
            'key_resources',
            'key_activities',
            'key_partnerships',
            'cost_structure'
        ]));

        return redirect()->route('bmc.show', $business->id)
            ->with('success', 'Business Model Canvas berhasil dibuat!');
    }

    public function show($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::with('bmcData')->find($id);
            
            if (!$business) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            // Check if BMC data exists
            if (!$business->bmcData) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Data BMC tidak lengkap. Silakan buat ulang BMC.');
            }

            return view('bmc.show', compact('business'));
            
        } catch (\Exception $e) {
            \Log::error('Error in BmcController@show: ' . $e->getMessage());
            return redirect()->route('bmc.landing')
                ->with('error', 'Terjadi kesalahan saat memuat data BMC.');
        }
    }


    public function edit($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::with('bmcData')->find($id);
            
            if (!$business) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            // Check if BMC data exists
            if (!$business->bmcData) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Data BMC tidak lengkap. Silakan buat ulang BMC.');
            }

            return view('bmc.edit', compact('business'));
            
        } catch (\Exception $e) {
            \Log::error('Error in BmcController@edit: ' . $e->getMessage());
            return redirect()->route('bmc.landing')
                ->with('error', 'Terjadi kesalahan saat memuat data BMC untuk diedit.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::with('bmcData')->find($id);
            
            if (!$business) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            // Check if BMC data exists
            if (!$business->bmcData) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Data BMC tidak lengkap. Silakan buat ulang BMC.');
            }
            
            $request->validate([
                'owner_name' => 'required|string|max:255',
                'business_name' => 'required|string|max:255',
                'business_description' => 'required|string',
                'location' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'customer_segments' => 'required|array',
                'value_propositions' => 'required|array',
                'channels' => 'required|array',
                'customer_relationships' => 'required|array',
                'revenue_streams' => 'required|array',
                'key_resources' => 'required|array',
                'key_activities' => 'required|array',
                'key_partnerships' => 'required|array',
                'cost_structure' => 'required|array',
            ]);

            $business->update($request->only([
                'owner_name',
                'business_name',
                'business_description',
                'location',
                'phone_number'
            ]));

            $business->bmcData->update($request->only([
                'customer_segments',
                'value_propositions',
                'channels',
                'customer_relationships',
                'revenue_streams',
                'key_resources',
                'key_activities',
                'key_partnerships',
                'cost_structure'
            ]));

            return redirect()->route('bmc.show', $business->id)
                ->with('success', 'Business Model Canvas berhasil diperbarui!');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            \Log::error('Error in BmcController@update: ' . $e->getMessage());
            return redirect()->route('bmc.landing')
                ->with('error', 'Terjadi kesalahan saat memperbarui data BMC.');
        }
    }

    public function destroy($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->back()
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::find($id);
            
            if (!$business) {
                return redirect()->back()
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            $business->delete();

            // Check if request came from admin dashboard
            $referer = request()->header('referer');
            $isFromAdmin = $referer && str_contains($referer, '/admin');
            
            if ($isFromAdmin) {
                return redirect()->route('admin.index')
                    ->with('success', 'Business Model Canvas berhasil dihapus!');
            }

            return redirect()->route('bmc.landing')
                ->with('success', 'Business Model Canvas berhasil dihapus!');
                
        } catch (\Exception $e) {
            \Log::error('Error in BmcController@destroy: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus data BMC.');
        }
    }

    public function duplicate($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $originalBusiness = Business::with('bmcData')->find($id);
            
            if (!$originalBusiness) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            // Check if BMC data exists
            if (!$originalBusiness->bmcData) {
                return redirect()->route('bmc.landing')
                    ->with('error', 'Data BMC tidak lengkap. Tidak dapat diduplikasi.');
            }
            
            // Create new business with copied data
            $newBusiness = $originalBusiness->replicate();
            $newBusiness->business_name = $originalBusiness->business_name . ' (Copy)';
            $newBusiness->save();
            
            // Create new BMC data
            $newBmcData = $originalBusiness->bmcData->replicate();
            $newBmcData->business_id = $newBusiness->id;
            $newBmcData->save();
            
            return redirect()->route('bmc.show', $newBusiness->id)
                ->with('success', 'Business Model Canvas berhasil diduplikasi!');
                
        } catch (\Exception $e) {
            \Log::error('Error in BmcController@duplicate: ' . $e->getMessage());
            return redirect()->route('bmc.landing')
                ->with('error', 'Terjadi kesalahan saat menduplikasi data BMC.');
        }
    }
}
