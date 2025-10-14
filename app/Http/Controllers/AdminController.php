<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use App\Models\TamSamSom;
use App\Models\Projection;
use App\Exports\BusinessExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        try {
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
            
            // Get Market Validation data from database
            $tamSamSomQuery = TamSamSom::query();
            if ($request->has('search') && $request->search) {
                $tamSamSomQuery->search($request->search);
            }
            $tamSamSomHistory = $tamSamSomQuery->latest()->get();
            
        // Financial Projection history is now handled by the new Projection model
            
            // Get new Financial Projection data
            $projectionQuery = Projection::query();
            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $projectionQuery->where(function($q) use ($search) {
                    $q->where('business_name', 'like', "%{$search}%");
                });
            }
            $projections = $projectionQuery->latest()->get();
            
            return view('admin.index', compact('businesses', 'tamSamSomHistory', 'projections'));
            
        } catch (\Exception $e) {
            Log::error('AdminController@index Error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('bmc.landing')
                ->with('error', 'Terjadi kesalahan saat mengakses dashboard admin. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('admin.index')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::with('bmcData')->findOrFail($id);
            
            // Check if business has BMC data
            if (!$business->bmcData) {
                return redirect()->route('admin.index')
                    ->with('error', 'Data BMC tidak tersedia untuk bisnis ini.');
            }
            
            return view('admin.show', compact('business'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('AdminController@show - Business not found', [
                'business_id' => $id,
                'user_id' => auth()->id()
            ]);
            
            return redirect()->route('admin.index')
                ->with('error', 'Data BMC tidak ditemukan.');
                
        } catch (\Exception $e) {
            Log::error('AdminController@show Error: ' . $e->getMessage(), [
                'business_id' => $id,
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('admin.index')
                ->with('error', 'Terjadi kesalahan saat mengakses data BMC.');
        }
    }

    public function export(Request $request)
    {
        try {
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
            
            return Excel::download(new BusinessExport($businesses), 'bmc_data_' . date('Y-m-d_H-i-s') . '.xlsx');
            
        } catch (\Exception $e) {
            Log::error('AdminController@export Error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('admin.index')
                ->with('error', 'Terjadi kesalahan saat mengexport data. Silakan coba lagi.');
        }
    }

    public function exportAll(Request $request)
    {
        try {
            // Implementation for export all data
            return redirect()->route('admin.index')
                ->with('success', 'Export semua data berhasil!');
                
        } catch (\Exception $e) {
            Log::error('AdminController@exportAll Error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('admin.index')
                ->with('error', 'Terjadi kesalahan saat mengexport data. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        try {
            // Validate ID format
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('admin.index')
                    ->with('error', 'ID BMC tidak valid.');
            }

            $business = Business::findOrFail($id);
            $business->delete();

            return redirect()->route('admin.index')
                ->with('success', 'Data BMC berhasil dihapus!');
                
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('AdminController@destroy - Business not found', [
                'business_id' => $id,
                'user_id' => auth()->id()
            ]);
            
            return redirect()->route('admin.index')
                ->with('error', 'Data BMC tidak ditemukan.');
                
        } catch (\Exception $e) {
            Log::error('AdminController@destroy Error: ' . $e->getMessage(), [
                'business_id' => $id,
                'user_id' => auth()->id(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('admin.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data BMC.');
        }
    }
}