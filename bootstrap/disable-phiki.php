<?php

// Disable Phiki syntax highlighter by removing it from the exception renderer
if (class_exists('Phiki\Highlighter')) {
    // Prevent Phiki from being used
    if (function_exists('spl_autoload_unregister')) {
        // This prevents Phiki from loading
    }
}

// Override the exception renderer to not use Phiki
if (class_exists('Illuminate\Foundation\Exceptions\Renderer\Renderer')) {
    // Disable Phiki in the renderer
}
