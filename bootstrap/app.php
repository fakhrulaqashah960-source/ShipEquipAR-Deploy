<?php


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
        | Custom Middleware Alias
        |--------------------------------------------------------------------------
        */


        $middleware->alias([


        'admin'=>AdminMiddleware::class,

        'user'=>UserMiddleware::class,


        'prevent.back'=>PreventBackHistory::class,


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


    })



    ->create();