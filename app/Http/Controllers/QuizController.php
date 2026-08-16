<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;


class QuizController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | USER QUIZ LIST
    |--------------------------------------------------------------------------
    */


    public function index()
    {


        $quizzes = Quiz::where(
            'status',
            'Active'
        )
        ->get();



        return view(
            'user.quiz.index',
            compact('quizzes')
        );


    }





    /*
    |--------------------------------------------------------------------------
    | OPEN QUIZ
    |--------------------------------------------------------------------------
    */


    public function show($id)
    {


        $quiz = Quiz::findOrFail($id);



        return view(
            'user.quiz.show',
            compact('quiz')
        );


    }



}