<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ShipController;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminQuizController;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminNoteController;
use App\Http\Controllers\AdminDashboardController;

use App\Http\Controllers\NoteController;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| AR QUICK LOOK MODEL
|--------------------------------------------------------------------------
|
| IMPORTANT:
|
| This route is deliberately outside:
|
| auth
| prevent.back
|
| The equipment page itself is still protected.
|
| Quick Look must be able to request the model directly.
|
*/

Route::get(
    '/ar-model/{file}',
    function ($file) {


        /*
        |--------------------------------------------------------------------------
        | DECODE FILE NAME
        |--------------------------------------------------------------------------
        */

        $file =
            rawurldecode(
                $file
            );


        /*
        |--------------------------------------------------------------------------
        | SECURITY
        |--------------------------------------------------------------------------
        */

        $file =
            basename(
                $file
            );


        /*
        |--------------------------------------------------------------------------
        | ONLY REALITY
        |--------------------------------------------------------------------------
        */

        if (

            !str_ends_with(
                strtolower($file),
                '.reality'
            )

        ) {

            abort(404);

        }


        /*
        |--------------------------------------------------------------------------
        | LOCAL SYNCED MODEL
        |--------------------------------------------------------------------------
        |
        | SyncArModels downloads the GitHub Release assets to:
        |
        | public/uploads/reality/
        |
        */

        $path =
            public_path(
                'uploads/reality/' .
                $file
            );


        /*
        |--------------------------------------------------------------------------
        | VERIFY MODEL
        |--------------------------------------------------------------------------
        */

        if (

            !is_file($path)

            ||

            !is_readable($path)

        ) {

            abort(
                404,
                'AR model not found.'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | SEND DIRECTLY TO SAFARI
        |--------------------------------------------------------------------------
        */

        return response()->file(
            $path,
            [

                /*
                |--------------------------------------------------------------------------
                | APPLE REALITY MIME
                |--------------------------------------------------------------------------
                */

                'Content-Type' =>
                    'model/vnd.reality',


                /*
                |--------------------------------------------------------------------------
                | INLINE - NOT DOWNLOAD
                |--------------------------------------------------------------------------
                */

                'Content-Disposition' =>
                    'inline; filename="' .
                    $file .
                    '"',


                /*
                |--------------------------------------------------------------------------
                | CACHE
                |--------------------------------------------------------------------------
                |
                | Model is cached by Safari/CDN/browser for faster
                | subsequent opening.
                |
                */

                'Cache-Control' =>
                    'public, max-age=86400',

            ]
        );


    }
)
->where(
    'file',
    '[^/]+\.reality'
)
->name(
    'ar.model'
);


/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'user',
    'prevent.back'
])
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        function () {


            $modules =
                \App\Models\Module::with(
                    'equipments'
                )
                ->get();


            $ships =
                \App\Models\Ship::orderBy(
                    'id',
                    'asc'
                )
                ->get();


            return view(
                'user.dashboard',
                compact(
                    'modules',
                    'ships'
                )
            );


        }
    )
    ->name(
        'dashboard'
    );


    /*
    |--------------------------------------------------------------------------
    | SHIP MODELS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/ship-models',
        [
            ShipController::class,
            'userIndex'
        ]
    )
    ->name(
        'user.ship-models'
    );


    /*
    |--------------------------------------------------------------------------
    | SHIP DETAIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/ship/{id}',
        [
            ShipController::class,
            'userShow'
        ]
    )
    ->name(
        'ship.show'
    );


    /*
    |--------------------------------------------------------------------------
    | LEARNING MODULE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/learning-module/{id}',
        [
            ModuleController::class,
            'userShow'
        ]
    )
    ->name(
        'learning.show'
    );


    /*
    |--------------------------------------------------------------------------
    | LEARNING MODULE EQUIPMENT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/learning-module/{id}/equipment',
        [
            ModuleController::class,
            'userShow'
        ]
    )
    ->name(
        'learning.equipment'
    );


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT DETAIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/equipment/{id}',
        [
            EquipmentController::class,
            'userShow'
        ]
    )
    ->name(
        'equipment.show'
    );


    /*
    |--------------------------------------------------------------------------
    | NOTES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/module-notes',
        [
            NoteController::class,
            'index'
        ]
    )
    ->name(
        'user.notes'
    );


    Route::get(
        '/module-notes/{id}',
        [
            NoteController::class,
            'show'
        ]
    )
    ->name(
        'user.notes.show'
    );


    /*
    |--------------------------------------------------------------------------
    | COURSE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/course/{id}',
        [
            CourseController::class,
            'userShow'
        ]
    )
    ->name(
        'course.show'
    );


    /*
    |--------------------------------------------------------------------------
    | LESSON
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/lesson/{id}',
        [
            LessonController::class,
            'userShow'
        ]
    )
    ->name(
        'lesson.show'
    );


    /*
    |--------------------------------------------------------------------------
    | QUIZ
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/quiz',
        [
            QuizController::class,
            'index'
        ]
    )
    ->name(
        'quiz.index'
    );


    Route::get(
        '/quiz/start/{id}',
        [
            QuizController::class,
            'show'
        ]
    )
    ->name(
        'quiz.show'
    );


    Route::post(
        '/quiz/{id}/submit',
        [
            QuizController::class,
            'submit'
        ]
    )
    ->name(
        'quiz.submit'
    );


});


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'admin',
    'prevent.back'
])
->prefix(
    'admin'
)
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/',
        [
            AdminDashboardController::class,
            'index'
        ]
    )
    ->name(
        'admin.dashboard'
    );


    /*
    |--------------------------------------------------------------------------
    | USER MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'users',
        AdminUserController::class
    )
    ->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ])
    ->names(
        'admin.users'
    );


    /*
    |--------------------------------------------------------------------------
    | MODULE MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'modules',
        ModuleController::class
    );


    Route::get(
        'modules/{id}/equipment',
        [
            ModuleController::class,
            'equipment'
        ]
    )
    ->name(
        'admin.module.equipment'
    );


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'equipment',
        EquipmentController::class
    )
    ->names(
        'admin.equipment'
    );


    /*
    |--------------------------------------------------------------------------
    | SHIPS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'ships',
        ShipController::class
    )
    ->names(
        'admin.ships'
    );


    /*
    |--------------------------------------------------------------------------
    | NOTES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'notes',
        AdminNoteController::class
    )
    ->names(
        'admin.notes'
    );


    /*
    |--------------------------------------------------------------------------
    | QUIZ
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'quiz',
        AdminQuizController::class
    )
    ->names(
        'admin.quiz'
    );


    /*
    |--------------------------------------------------------------------------
    | COURSE
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'course',
        CourseController::class
    );


    /*
    |--------------------------------------------------------------------------
    | LESSON
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'lesson',
        LessonController::class
    );


});


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'prevent.back'
])
->group(function () {


    Route::get(
        '/profile',
        [
            ProfileController::class,
            'edit'
        ]
    )
    ->name(
        'profile.edit'
    );


    Route::patch(
        '/profile',
        [
            ProfileController::class,
            'update'
        ]
    )
    ->name(
        'profile.update'
    );


    Route::delete(
        '/profile',
        [
            ProfileController::class,
            'destroy'
        ]
    )
    ->name(
        'profile.destroy'
    );


});