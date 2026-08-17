<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\PreventBackHistory;


return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(

        web: __DIR__.'/../routes/web.php',

        commands: __DIR__.'/../routes/console.php',

        health: '/up',

    )


    ->withMiddleware(function (Middleware $middleware) {


        /*
        |--------------------------------------------------------------------------
        | Trust Render Proxy
        |--------------------------------------------------------------------------
        |
        | Render berada di depan Laravel sebagai proxy.
        | Ini memastikan Laravel tahu request sebenar menggunakan HTTPS.
        |
        */

        $middleware->trustProxies(

            at: '*',

            headers:
                Request::HEADER_X_FORWARDED_FOR |
                Request::HEADER_X_FORWARDED_HOST |
                Request::HEADER_X_FORWARDED_PORT |
                Request::HEADER_X_FORWARDED_PROTO

        );



        /*
        |--------------------------------------------------------------------------
        | Custom Middleware Alias
        |--------------------------------------------------------------------------
        */

        $middleware->alias([

            'admin' => AdminMiddleware::class,

            'user' => UserMiddleware::class,

            'prevent.back' => PreventBackHistory::class,

        ]);



        /*
        |--------------------------------------------------------------------------
        | Prevent Browser Back After Logout
        |--------------------------------------------------------------------------
        */

        $middleware->append([

            PreventBackHistory::class,

        ]);

    })


    ->withExceptions(function (Exceptions $exceptions) {

        //

    })


    ->create();