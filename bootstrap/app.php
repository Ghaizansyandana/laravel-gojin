<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

// Enable debug mode to see errors
putenv('APP_DEBUG=true');

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();


    

    // Test Model
    Route::get('/test-model', function() {
        $data = Post::all();
        return $data;
    });

    Route::get('/create-data-post', function() {
        $data = Post::create([
            'title' => 'Belajar PHP',
            'content' => 'Lorem ipsum'
        ]);
        return $data;
    });


