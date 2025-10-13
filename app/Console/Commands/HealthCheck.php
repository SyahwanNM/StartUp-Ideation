<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Business;
use App\Models\TamSamSom;
use App\Models\Projection;

class HealthCheck extends Command
{
    protected $signature = 'app:health-check';
    protected $description = 'Check application health and detect potential issues';

    public function handle()
    {
        $this->info('🔍 Starting Health Check...');
        
        $issues = [];
        
        // Check database connection
        try {
            DB::connection()->getPdo();
            $this->info('✅ Database connection: OK');
        } catch (\Exception $e) {
            $issues[] = 'Database connection failed: ' . $e->getMessage();
            $this->error('❌ Database connection: FAILED');
        }
        
        // Check required tables
        $requiredTables = ['users', 'businesses', 'bmc_data', 'tam_sam_soms', 'projections', 'sessions'];
        foreach ($requiredTables as $table) {
            try {
                DB::table($table)->count();
                $this->info("✅ Table {$table}: OK");
            } catch (\Exception $e) {
                $issues[] = "Table {$table} not accessible: " . $e->getMessage();
                $this->error("❌ Table {$table}: FAILED");
            }
        }
        
        // Check models
        $models = [
            'User' => User::class,
            'Business' => Business::class,
            'TamSamSom' => TamSamSom::class,
            'Projection' => Projection::class,
        ];
        
        foreach ($models as $name => $class) {
            try {
                $class::count();
                $this->info("✅ Model {$name}: OK");
            } catch (\Exception $e) {
                $issues[] = "Model {$name} not working: " . $e->getMessage();
                $this->error("❌ Model {$name}: FAILED");
            }
        }
        
        // Check admin user
        try {
            $admin = User::where('role', 'admin')->first();
            if ($admin) {
                $this->info('✅ Admin user: OK');
            } else {
                $issues[] = 'No admin user found';
                $this->error('❌ Admin user: NOT FOUND');
            }
        } catch (\Exception $e) {
            $issues[] = 'Cannot check admin user: ' . $e->getMessage();
            $this->error('❌ Admin user: FAILED');
        }
        
        // Check routes
        try {
            $routes = \Route::getRoutes();
            $this->info('✅ Routes: OK (' . count($routes) . ' routes)');
        } catch (\Exception $e) {
            $issues[] = 'Routes not accessible: ' . $e->getMessage();
            $this->error('❌ Routes: FAILED');
        }
        
        // Summary
        if (empty($issues)) {
            $this->info('🎉 All health checks passed!');
            Log::info('Health check completed successfully');
        } else {
            $this->error('⚠️  Found ' . count($issues) . ' issues:');
            foreach ($issues as $issue) {
                $this->error("  - {$issue}");
            }
            Log::error('Health check found issues', ['issues' => $issues]);
        }
        
        return empty($issues) ? 0 : 1;
    }
}

