<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //$middleware->append(\App\Http\Middleware\CheckRoleMiddleware::class); // (1) => Middleware Global
        
        $middleware
            //  ->append(\App\Http\Middleware\TestMiddleware::class) // (1) => Middleware Global
            //  ->append(\App\Http\Middleware\CheckRoleMiddleware::class);

            // 2- Groupes de Middleware
            /*
            ->appendToGroup(
                'testGroup',
                [
                    \App\Http\Middleware\CheckRoleMiddleware::class,
                    \App\Http\Middleware\TestMiddleware::class
                ]
            );  
            */

            /*
            ->web(append: [
                \App\Http\Middleware\TestMiddleware::class,
                \App\Http\Middleware\CheckRoleMiddleware::class
            ]); 
            */

            
            // 3- Middleware - Alias ​​du middleware
            ->alias([
                'checkRole' => \App\Http\Middleware\CheckRoleMiddleware::class
            ]);
            

            /*
            ->alias([
                'checkRole' => \App\Http\Middleware\CheckRoleMiddleware::class,
            ]);
            */
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
