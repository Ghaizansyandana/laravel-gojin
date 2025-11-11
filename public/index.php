<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

try {
    $app->handleRequest(Request::capture());
} catch (Throwable $e) {
    // Catch Phiki errors and return plain text
    if (strpos(get_class($e), 'Phiki') !== false || 
        strpos($e->getMessage(), 'PatternSearcher') !== false ||
        strpos($e->getMessage(), 'syntax-highlight') !== false) {
        http_response_code(500);
        mb_internal_encoding('UTF-8');
        echo 'Internal Server Error - Syntax Highlighter Issue';
        exit(1);
    }
    throw $e;
}
