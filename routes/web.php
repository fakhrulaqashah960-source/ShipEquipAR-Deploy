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

require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| LEGACY AR MODEL
|--------------------------------------------------------------------------
|
| Digunakan untuk data lama yang hanya simpan nama fail.
|
*/

Route::middleware([
    'auth',
    'prevent.back',
])
->get('/ar-model/{file}', function ($file) {

    $url =
        'https://github.com/' .
        'fakhrulaqashah960-source/' .
        'ShipEquipAR/' .
        'releases/latest/download/' .
        rawurlencode($file);

    return redirect()->away($url);

})
->name('ar.model');


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

    Route::get('/dashboard', function () {

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

    })
    ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | ALL SHIP MODELS
    |--------------------------------------------------------------------------
    |
    | Page yang paparkan semua ship.
    |
    */

    Route::get(
        '/ship-models',
        [ShipController::class, 'userIndex']
    )
    ->name('user.ship-models');


    /*
    |--------------------------------------------------------------------------
    | INDIVIDUAL SHIP DETAIL
    |--------------------------------------------------------------------------
    |
    | Contoh:
    | /ship/1
    |
    | Bila user klik Container Vessel / Bulk Carrier dalam sidebar,
    | page ini akan tunjuk satu ship sahaja.
    |
    */

    Route::get(
        '/ship/{id}',
        [ShipController::class, 'userShow']
    )
    ->name('ship.show');


    /*
    |--------------------------------------------------------------------------
    | LEARNING MODULE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/learning-module/{id}',
        [ModuleController::class, 'userShow']
    )
    ->name('learning.show');


    /*
    |--------------------------------------------------------------------------
    | LEARNING MODULE EQUIPMENT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/learning-module/{id}/equipment',
        [ModuleController::class, 'userShow']
    )
    ->name('learning.equipment');


    Route::get(
    '/equipment/{id}/ar',
    [EquipmentController::class, 'openAr']
)
->middleware('signed')
->name('equipment.ar');


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT DETAIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/equipment/{id}',
        [EquipmentController::class, 'userShow']
    )
    ->name('equipment.show');


    /*
    |--------------------------------------------------------------------------
    | MODULE NOTES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/module-notes',
        [NoteController::class, 'index']
    )
    ->name('user.notes');


    Route::get(
        '/module-notes/{id}',
        [NoteController::class, 'show']
    )
    ->name('user.notes.show');


    /*
    |--------------------------------------------------------------------------
    | COURSE
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/course/{id}',
        [CourseController::class, 'userShow']
    )
    ->name('course.show');


    /*
    |--------------------------------------------------------------------------
    | LESSON
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/lesson/{id}',
        [LessonController::class, 'userShow']
    )
    ->name('lesson.show');


    /*
    |--------------------------------------------------------------------------
    | QUIZ USER
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/quiz',
        [QuizController::class, 'index']
    )
    ->name('quiz.index');


    Route::get(
        '/quiz/start/{id}',
        [QuizController::class, 'show']
    )
    ->name('quiz.show');


    Route::post(
        '/quiz/{id}/submit',
        [QuizController::class, 'submit']
    )
    ->name('quiz.submit');

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
->prefix('admin')
->group(function () {


    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/',
        [AdminDashboardController::class, 'index']
    )
    ->name('admin.dashboard');


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
    ->names('admin.users');


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
        [ModuleController::class, 'equipment']
    )
    ->name('admin.module.equipment');


    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'equipment',
        EquipmentController::class
    )
    ->names('admin.equipment');


    /*
    |--------------------------------------------------------------------------
    | SHIP MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'ships',
        ShipController::class
    )
    ->names('admin.ships');


    /*
    |--------------------------------------------------------------------------
    | NOTES MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'notes',
        AdminNoteController::class
    )
    ->names('admin.notes');


    /*
    |--------------------------------------------------------------------------
    | QUIZ MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'quiz',
        AdminQuizController::class
    )
    ->names('admin.quiz');


    /*
    |--------------------------------------------------------------------------
    | COURSE MANAGEMENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'course',
        CourseController::class
    );


    /*
    |--------------------------------------------------------------------------
    | LESSON MANAGEMENT
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
        [ProfileController::class, 'edit']
    )
    ->name('profile.edit');


    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )
    ->name('profile.update');


    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )
    ->name('profile.destroy');

});