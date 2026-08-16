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
| AR MODEL
|--------------------------------------------------------------------------
*/


Route::middleware([
    'auth',
    'prevent.back',
])->get('/ar-model/{file}', function ($file) {

    $url = 'https://github.com/fakhrulaqashah960-source/ShipEquipAR/releases/latest/download/'
        . rawurlencode($file);

    return redirect()->away($url);
});


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


    Route::get('/dashboard', function(){


        $modules = \App\Models\Module::with('equipments')->get();


        return view(
            'user.dashboard',
            compact('modules')
        );


    })
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| LEARNING MODULE
|--------------------------------------------------------------------------
*/



Route::get(
    '/learning-module/{id}',
    [ModuleController::class,'userShow']
)
->name('learning.show');






    // EQUIPMENT / AR PAGE

    Route::get(
        '/learning-module/{id}/equipment',
        [ModuleController::class,'userShow']
    )
    ->name('learning.equipment');









    /*
    |--------------------------------------------------------------------------
    | EQUIPMENT DETAIL
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/equipment/{id}',
        [EquipmentController::class,'userShow']
    )
    ->name('equipment.show');









    /*
    |--------------------------------------------------------------------------
    | NOTES
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/module-notes',
        [NoteController::class,'index']
    )
    ->name('user.notes');



    Route::get(
        '/module-notes/{id}',
        [NoteController::class,'show']
    )
    ->name('user.notes.show');









    /*
    |--------------------------------------------------------------------------
    | COURSE
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/course/{id}',
        [CourseController::class,'userShow']
    )
    ->name('course.show');









    /*
    |--------------------------------------------------------------------------
    | LESSON
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/lesson/{id}',
        [LessonController::class,'userShow']
    )
    ->name('lesson.show');









    /*
    |--------------------------------------------------------------------------
    | QUIZ USER
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/quiz',
        [QuizController::class,'index']
    )
    ->name('quiz.index');



    Route::get(
        '/quiz/start/{id}',
        [QuizController::class,'show']
    )
    ->name('quiz.show');



    Route::post(
        '/quiz/{id}/submit',
        [QuizController::class,'submit']
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
    | DASHBOARD
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/',
        [AdminDashboardController::class,'index']
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
    | MODULE MANAGEMENT
    |--------------------------------------------------------------------------
    */


    Route::resource(
    'modules',
    ModuleController::class
);



    Route::get(
        'modules/{id}/equipment',
        [ModuleController::class,'equipment']
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
        [ProfileController::class,'edit']
    )
    ->name('profile.edit');



    Route::patch(
        '/profile',
        [ProfileController::class,'update']
    )
    ->name('profile.update');



    Route::delete(
        '/profile',
        [ProfileController::class,'destroy']
    )
    ->name('profile.destroy');



});