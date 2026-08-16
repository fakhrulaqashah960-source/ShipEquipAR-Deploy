<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Lesson;
use App\Models\Course;
use App\Models\Progress;



class LessonController extends Controller
{


    // =====================================
    // ADMIN LESSON LIST
    // =====================================

    public function index()
    {


        $lessons = Lesson::with('course')
                    ->get();



        return view(

            'admin.lesson.index',

            compact('lessons')

        );


    }







    // =====================================
    // ADMIN CREATE LESSON PAGE
    // =====================================

    public function create()
    {


        $course = Course::find(request('course'));



        return view(

            'admin.lesson.create',

            compact('course')

        );


    }








    // =====================================
    // ADMIN STORE LESSON
    // =====================================

    public function store(Request $request)
    {


        $request->validate([


            'course_id'=>'required',


            'title'=>'required',


            'video'=>'required'


        ]);





        Lesson::create([


            'course_id'=>$request->course_id,


            'title'=>$request->title,


            'content'=>$request->content,


            'video'=>$request->video,


            'duration'=>$request->duration



        ]);






        return redirect('/admin/course');


    }








    // =====================================
    // ADMIN EDIT LESSON
    // =====================================

    public function edit($id)
    {


        $lesson = Lesson::findOrFail($id);



        return view(

            'admin.lesson.edit',

            compact('lesson')

        );


    }








    // =====================================
    // ADMIN UPDATE LESSON
    // =====================================

    public function update(Request $request,$id)
    {


        $lesson = Lesson::findOrFail($id);




        $lesson->update([


            'title'=>$request->title,


            'content'=>$request->content,


            'video'=>$request->video,


            'duration'=>$request->duration



        ]);





        return redirect('/admin/course');


    }








    // =====================================
    // ADMIN DELETE LESSON
    // =====================================

    public function destroy($id)
    {


        Lesson::findOrFail($id)->delete();



        return redirect('/admin/course');


    }









    // =====================================
    // USER VIEW LESSON
    // =====================================

    public function userShow($id)
    {


        $lesson = Lesson::findOrFail($id);



        return view(

            'user.lesson.show',

            compact('lesson')

        );


    }





}