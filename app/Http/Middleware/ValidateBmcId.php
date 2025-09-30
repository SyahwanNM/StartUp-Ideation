<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateBmcId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');
        
        // Check if ID is provided
        if (!$id) {
            return redirect()->route('bmc.landing')
                ->with('error', 'ID BMC tidak ditemukan.');
        }
        
        // Check if ID is numeric and positive
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->route('bmc.landing')
                ->with('error', 'ID BMC tidak valid.');
        }
        
        // Check if ID is within reasonable range (prevent integer overflow)
        if ($id > PHP_INT_MAX) {
            return redirect()->route('bmc.landing')
                ->with('error', 'ID BMC terlalu besar.');
        }
        
        return $next($request);
    }
}