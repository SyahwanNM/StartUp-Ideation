<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use App\Exports\BusinessExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Business::with('bmcData');
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('business_name', 'like', "%{$search}%")
                  ->orWhere('owner_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }
        
        $businesses = $query->latest()->get();
        return view('admin.index', compact('businesses'));
    }

    public function show($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('admin.index')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::with('bmcData')->find($id);
            
            if (!$business) {
                return redirect()->route('admin.index')
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            // Check if BMC data exists
            if (!$business->bmcData) {
                return redirect()->route('admin.index')
                    ->with('error', 'Data BMC tidak lengkap.');
            }

            return view('admin.show', compact('business'));
            
        } catch (\Exception $e) {
            \Log::error('Error in AdminController@show: ' . $e->getMessage());
            return redirect()->route('admin.index')
                ->with('error', 'Terjadi kesalahan saat memuat data BMC.');
        }
    }

    public function export(Request $request)
    {
        $query = Business::with('bmcData');
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('business_name', 'like', "%{$search}%")
                  ->orWhere('owner_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }
        
        $businesses = $query->latest()->get();
        
        return Excel::download(new BusinessExport($businesses), 'business-model-canvas-data.xlsx');
    }

    public function destroy($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('admin.index')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::find($id);
            
            if (!$business) {
                return redirect()->route('admin.index')
                    ->with('error', 'Business Model Canvas tidak ditemukan.');
            }

            $business->delete();

            return redirect()->route('admin.index')
                ->with('success', 'Business Model Canvas berhasil dihapus!');
                
        } catch (\Exception $e) {
            \Log::error('Error in AdminController@destroy: ' . $e->getMessage());
            return redirect()->route('admin.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data BMC.');
        }
    }
}
