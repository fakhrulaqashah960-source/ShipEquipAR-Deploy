<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\PreventBackHistory;


return Application::configure(
    basePath: dirname(__DIR__)
)

    /*
    |--------------------------------------------------------------------------
    | ROUTING
    |--------------------------------------------------------------------------
    */

    ->withRouting(

        web: __DIR__ . '/../routes/web.php',

        commands: __DIR__ . '/../routes/console.php',

        health: '/up',

    )


    /*
    |--------------------------------------------------------------------------
    | MIDDLEWARE
    |--------------------------------------------------------------------------
    */

    ->withMiddleware(function (Middleware $middleware) {


        /*
        |--------------------------------------------------------------------------
        | TRUST PROXIES
        |--------------------------------------------------------------------------
        |
        | Required for Render because the Laravel application
        | runs behind Render's reverse proxy.
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
        | PROPROFS CSRF EXCEPTION
        |--------------------------------------------------------------------------
        |
        | ProProfs server will POST quiz results directly to:
        |
        | /proprofs/quiz-result
        |
        | The request does not originate from a Laravel form,
        | therefore it will not contain Laravel's CSRF token.
        |
        | Security for this callback will instead be handled
        | using PROPROFS_NOTIFICATION_TOKEN.
        |
        */

        $middleware->validateCsrfTokens(

            except: [

                'proprofs/quiz-result',

            ]

        );


        /*
        |--------------------------------------------------------------------------
        | CUSTOM MIDDLEWARE ALIASES
        |--------------------------------------------------------------------------
        */

        $middleware->alias([

            'admin' =>
                AdminMiddleware::class,

            'user' =>
                UserMiddleware::class,

            'prevent.back' =>
                PreventBackHistory::class,

        ]);


        /*
        |--------------------------------------------------------------------------
        | PREVENT BROWSER BACK AFTER LOGOUT
        |--------------------------------------------------------------------------
        */

        $middleware->append([

            PreventBackHistory::class,

        ]);

    })


    /*
    |--------------------------------------------------------------------------
    | EXCEPTIONS
    |--------------------------------------------------------------------------
    */

    ->withExceptions(function (Exceptions $exceptions) {

        //

    })


    /*
    |--------------------------------------------------------------------------
    | CREATE APPLICATION
    |--------------------------------------------------------------------------
    */

    ->create();