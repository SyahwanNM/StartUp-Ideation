<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FinancialProjectionController extends Controller
{
    public function index()
    {
        // For demo purposes, return empty array
        $projections = [];
        return view('financial-projection.index', compact('projections'));
    }

    public function create()
    {
        return view('financial-projection.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'business_name' => 'required|string|max:255',
                'owner_name' => 'required|string|max:255',
                'projection_period' => 'required|integer|min:1|max:10',
                'currency' => 'required|string|max:10',
                'initial_investment' => 'required|numeric|min:0',
                'revenue_projections' => 'required|array',
                'expense_projections' => 'required|array',
                'assumptions' => 'nullable|array',
            ]);

            // For demo purposes, just redirect with success message
            // In real implementation, you would save to database
            
            return redirect()->route('financial-projection.create')
                ->with('success', 'Financial Projection berhasil dibuat! Data: ' . $request->business_name);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error in FinancialProjectionController@store: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data Financial Projection.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'ID Financial Projection tidak valid.');
            }

            $projection = FinancialProjection::find($id);
            
            if (!$projection) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'Financial Projection tidak ditemukan.');
            }

            return view('financial-projection.show', compact('projection'));
            
        } catch (\Exception $e) {
            Log::error('Error in FinancialProjectionController@show: ' . $e->getMessage());
            return redirect()->route('financial-projection.index')
                ->with('error', 'Terjadi kesalahan saat memuat data Financial Projection.');
        }
    }

    public function edit($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'ID Financial Projection tidak valid.');
            }

            $projection = FinancialProjection::find($id);
            
            if (!$projection) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'Financial Projection tidak ditemukan.');
            }

            return view('financial-projection.edit', compact('projection'));
            
        } catch (\Exception $e) {
            Log::error('Error in FinancialProjectionController@edit: ' . $e->getMessage());
            return redirect()->route('financial-projection.index')
                ->with('error', 'Terjadi kesalahan saat memuat data Financial Projection.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'ID Financial Projection tidak valid.');
            }

            $projection = FinancialProjection::find($id);
            
            if (!$projection) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'Financial Projection tidak ditemukan.');
            }

            $request->validate([
                'business_name' => 'required|string|max:255',
                'owner_name' => 'required|string|max:255',
                'projection_period' => 'required|integer|min:1|max:10',
                'currency' => 'required|string|max:10',
                'initial_investment' => 'required|numeric|min:0',
                'revenue_projections' => 'required|array',
                'expense_projections' => 'required|array',
                'assumptions' => 'nullable|array',
            ]);

            $projection->update([
                'business_name' => $request->business_name,
                'owner_name' => $request->owner_name,
                'projection_period' => $request->projection_period,
                'currency' => $request->currency,
                'initial_investment' => $request->initial_investment,
                'revenue_projections' => $request->revenue_projections,
                'expense_projections' => $request->expense_projections,
                'assumptions' => $request->assumptions ?? [],
            ]);

            return redirect()->route('financial-projection.show', $projection->id)
                ->with('success', 'Financial Projection berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Error in FinancialProjectionController@update: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data Financial Projection.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'ID Financial Projection tidak valid.');
            }

            $projection = FinancialProjection::find($id);
            
            if (!$projection) {
                return redirect()->route('financial-projection.index')
                    ->with('error', 'Financial Projection tidak ditemukan.');
            }

            $projection->delete();

            return redirect()->route('financial-projection.index')
                ->with('success', 'Financial Projection berhasil dihapus!');
                
        } catch (\Exception $e) {
            Log::error('Error in FinancialProjectionController@destroy: ' . $e->getMessage());
            return redirect()->route('financial-projection.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data Financial Projection.');
        }
    }
}
