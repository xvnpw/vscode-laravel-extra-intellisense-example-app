<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

function openCalculator() {
    $os = PHP_OS_FAMILY;
    
    switch ($os) {
        case 'Windows':
            pclose(popen("start calc", "r"));
            break;
        case 'Linux':
            pclose(popen("gnome-calculator &", "r")); // Works for GNOME, adjust for KDE/Xfce if needed
            break;
        case 'Darwin': // macOS
            pclose(popen("open -a Calculator", "r"));
            break;
        default:
            echo "Unsupported OS";
            break;
    }
}

openCalculator();

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
