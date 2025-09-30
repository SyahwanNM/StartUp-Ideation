<?php
/**
 * Health Check Script for Ideation BMC Generator
 * Place this file in the public directory for monitoring
 */

header('Content-Type: application/json');

$health = [
    'status' => 'ok',
    'timestamp' => date('Y-m-d H:i:s'),
    'checks' => []
];

// Check PHP version
$phpVersion = phpversion();
$health['checks']['php_version'] = [
    'status' => version_compare($phpVersion, '8.2.0', '>=') ? 'ok' : 'error',
    'version' => $phpVersion,
    'required' => '8.2+'
];

// Check required PHP extensions
$requiredExtensions = ['pdo', 'pdo_mysql', 'mbstring', 'xml', 'curl', 'zip', 'gd'];
$missingExtensions = [];

foreach ($requiredExtensions as $ext) {
    if (!extension_loaded($ext)) {
        $missingExtensions[] = $ext;
    }
}

$health['checks']['php_extensions'] = [
    'status' => empty($missingExtensions) ? 'ok' : 'error',
    'missing' => $missingExtensions,
    'required' => $requiredExtensions
];

// Check Laravel application
try {
    require_once __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    $health['checks']['laravel'] = [
        'status' => 'ok',
        'version' => app()->version()
    ];
} catch (Exception $e) {
    $health['checks']['laravel'] = [
        'status' => 'error',
        'error' => $e->getMessage()
    ];
}

// Check database connection
try {
    $pdo = new PDO(
        'mysql:host=' . env('DB_HOST', 'localhost') . ';port=' . env('DB_PORT', '3306'),
        env('DB_USERNAME'),
        env('DB_PASSWORD')
    );
    
    $health['checks']['database'] = [
        'status' => 'ok',
        'host' => env('DB_HOST', 'localhost')
    ];
} catch (Exception $e) {
    $health['checks']['database'] = [
        'status' => 'error',
        'error' => $e->getMessage()
    ];
}

// Check storage permissions
$storageWritable = is_writable(__DIR__ . '/../storage');
$bootstrapWritable = is_writable(__DIR__ . '/../bootstrap/cache');

$health['checks']['permissions'] = [
    'status' => ($storageWritable && $bootstrapWritable) ? 'ok' : 'error',
    'storage_writable' => $storageWritable,
    'bootstrap_writable' => $bootstrapWritable
];

// Check CDN fallback files
$cdnFiles = [
    'assets/css/bootstrap.min.css',
    'assets/css/fontawesome.min.css',
    'assets/js/bootstrap.bundle.min.js',
    'assets/js/html2canvas.min.js',
    'assets/js/jspdf.umd.min.js'
];

$missingFiles = [];
foreach ($cdnFiles as $file) {
    if (!file_exists(__DIR__ . '/' . $file)) {
        $missingFiles[] = $file;
    }
}

$health['checks']['cdn_fallback'] = [
    'status' => empty($missingFiles) ? 'ok' : 'warning',
    'missing_files' => $missingFiles
];

// Determine overall status
$overallStatus = 'ok';
foreach ($health['checks'] as $check) {
    if ($check['status'] === 'error') {
        $overallStatus = 'error';
        break;
    } elseif ($check['status'] === 'warning') {
        $overallStatus = 'warning';
    }
}

$health['status'] = $overallStatus;

// Return appropriate HTTP status code
if ($overallStatus === 'error') {
    http_response_code(500);
} elseif ($overallStatus === 'warning') {
    http_response_code(200);
} else {
    http_response_code(200);
}

echo json_encode($health, JSON_PRETTY_PRINT);
?>
