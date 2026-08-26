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
use App\Http\Controllers\ProProfsQuizCallbackController;


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
| PROPROFS QUIZ CALLBACK
|--------------------------------------------------------------------------
*/

Route::post(
    '/proprofs/quiz-result',
    [
        ProProfsQuizCallbackController::class,
        'store'
    ]
)
->name('proprofs.quiz-result');

Route::get('/proprofs/diagnostic', function () {

    $token = trim(
        (string) config(
            'services.proprofs.notification_token',
            ''
        )
    );

    $quizAttemptModelExists =
        class_exists(
            \App\Models\QuizAttempt::class
        );

    $quizAttemptsTableExists = false;
    $quizAttemptCount = null;
    $uniqueParticipants = null;
    $databaseError = null;

    try {

        $quizAttemptsTableExists =
            \Illuminate\Support\Facades\Schema::hasTable(
                'quiz_attempts'
            );

        if ($quizAttemptsTableExists) {

            $quizAttemptCount =
                \App\Models\QuizAttempt::count();

            $uniqueParticipants =
                \App\Models\QuizAttempt::query()
                    ->whereNotNull('user_id')
                    ->distinct()
                    ->count('user_id');

        }

    } catch (\Throwable $e) {

        $databaseError =
            get_class($e);

    }

    return response()->json([
        'configured' =>
            $token !== '',

        'length' =>
            strlen($token),

        'fingerprint' =>
            substr(
                hash('sha256', $token),
                0,
                12
            ),

        'quiz_attempt_model' =>
            $quizAttemptModelExists,

        'quiz_attempts_table' =>
            $quizAttemptsTableExists,

        'quiz_attempt_count' =>
            $quizAttemptCount,

        'unique_participants' =>
            $uniqueParticipants,

        'database_error' =>
            $databaseError,
    ]);

});


/*
|--------------------------------------------------------------------------
| AR QUICK LOOK
|--------------------------------------------------------------------------
|
| Keep this OUTSIDE auth middleware.
|
| Safari / Quick Look must be able to fetch the model directly.
|
*/

Route::get(
    '/ar-model/{file}',
    function ($file) {


        /*
        |--------------------------------------------------------------------------
        | DECODE
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
        | ONLY .REALITY
        |--------------------------------------------------------------------------
        */

        abort_unless(

            str_ends_with(
                strtolower($file),
                '.reality'
            ),

            404

        );


        /*
        |--------------------------------------------------------------------------
        | LOCAL RENDER FILE
        |--------------------------------------------------------------------------
        */

        $path =
            public_path(
                'uploads/reality/' .
                $file
            );


        /*
        |--------------------------------------------------------------------------
        | VERIFY
        |--------------------------------------------------------------------------
        */

        abort_unless(

            is_file($path)
            &&
            is_readable($path),

            404

        );


        /*
        |--------------------------------------------------------------------------
        | QUICK LOOK RESPONSE
        |--------------------------------------------------------------------------
        |
        | Keep headers minimal.
        |
        */

        return response()->file(
            $path,
            [

                'Content-Type' =>
                    'model/vnd.reality',

                'Content-Disposition' =>
                    'inline',

                'Cache-Control' =>
                    'public, max-age=31536000, immutable',

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
    | USER DASHBOARD
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
    ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | SHIPS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/ship-models',
        [
            ShipController::class,
            'userIndex'
        ]
    )
    ->name('user.ship-models');


    Route::get(
        '/ship/{id}',
        [
            ShipController::class,
            'userShow'
        ]
    )
    ->name('ship.show');


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
    ->name('learning.show');


    Route::get(
        '/learning-module/{id}/equipment',
        [
            ModuleController::class,
            'userShow'
        ]
    )
    ->name('learning.equipment');


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/equipment/{id}',
        [
            EquipmentController::class,
            'userShow'
        ]
    )
    ->name('equipment.show');


    /*
    |--------------------------------------------------------------------------
    | MODULE NOTES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/module-notes',
        [
            NoteController::class,
            'index'
        ]
    )
    ->name('user.notes');


    Route::get(
        '/module-notes/{id}',
        [
            NoteController::class,
            'show'
        ]
    )
    ->name('user.notes.show');


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
    ->name('course.show');


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
    ->name('lesson.show');


    /*
    |--------------------------------------------------------------------------
    | QUIZ
    |--------------------------------------------------------------------------
    |
    | quiz.index boleh digunakan untuk page ProProfs embedded quiz.
    |
    | Route show dan submit lama dikekalkan buat sementara supaya
    | route lama tidak rosak jika masih dipanggil di mana-mana Blade.
    |
    */

    Route::get(
        '/quiz',
        [
            QuizController::class,
            'index'
        ]
    )
    ->name('quiz.index');


    Route::get(
        '/quiz/start/{id}',
        [
            QuizController::class,
            'show'
        ]
    )
    ->name('quiz.show');


    Route::post(
        '/quiz/{id}/submit',
        [
            QuizController::class,
            'submit'
        ]
    )
    ->name('quiz.submit');


});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'admin',
    'prevent.back'
])
->prefix('admin')
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
    ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | USERS
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
    ->names('admin.users');


    /*
    |--------------------------------------------------------------------------
    | MODULES
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
    ->name('admin.module.equipment');


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'equipment',
        EquipmentController::class
    )
    ->names('admin.equipment');


    /*
    |--------------------------------------------------------------------------
    | SHIPS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'ships',
        ShipController::class
    )
    ->names('admin.ships');


    /*
    |--------------------------------------------------------------------------
    | NOTES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'notes',
        AdminNoteController::class
    )
    ->names('admin.notes');


    /*
    |--------------------------------------------------------------------------
    | QUIZ
    |--------------------------------------------------------------------------
    |
    | Admin Quiz boleh terus digunakan untuk mengurus quiz / embed URL.
    |
    */

    Route::resource(
        'quiz',
        AdminQuizController::class
    )
    ->names('admin.quiz');


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
    ->name('profile.edit');


    Route::patch(
        '/profile',
        [
            ProfileController::class,
            'update'
        ]
    )
    ->name('profile.update');


    Route::delete(
        '/profile',
        [
            ProfileController::class,
            'destroy'
        ]
    )
    ->name('profile.destroy');


});