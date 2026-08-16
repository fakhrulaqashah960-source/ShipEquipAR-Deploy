<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;


class AdminQuizController extends Controller
{


    public function index()
    {

        $quizzes = Quiz::all();


        return view(
            'admin.quiz.index',
            compact('quizzes')
        );

    }





    public function create()
    {

        return view(
            'admin.quiz.create'
        );

    }






    public function store(Request $request)
    {


        $request->validate([

            'title'=>'required',

            'description'=>'required',

            'google_form_url'=>'required',

            'platform'=>'required',

            'passing_score'=>'required',

            'status'=>'required'

        ]);




        Quiz::create([


            'title'=>$request->title,


            'description'=>$request->description,


            'google_form_url'=>$request->google_form_url,


            'platform'=>$request->platform,


            'quiz_url'=>$request->google_form_url,


            'passing_score'=>$request->passing_score,


            'status'=>$request->status


        ]);





        return redirect()

        ->route('quiz.index')

        ->with(

            'success',

            'Quiz Added Successfully'

        );


    }






    public function destroy($id)
    {


        $quiz = Quiz::findOrFail($id);


        $quiz->delete();



        return back();


    }




}