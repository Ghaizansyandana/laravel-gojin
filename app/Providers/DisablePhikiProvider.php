<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Exceptions\Renderer\Renderer;

class DisablePhikiProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Override the exception renderer to disable Phiki
        $this->app->singleton('exception.renderer', function ($app) {
            return new class {
                public function render($exception)
                {
                    // Return plain text for any exception
                    return "Internal Server Error\n\n" . get_class($exception) . ": " . $exception->getMessage();
                }
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
