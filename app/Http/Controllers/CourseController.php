<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;


class CourseController extends Controller
{


    // ADMIN COURSE LIST

    public function index()
    {

        $courses = Course::all();


        return view(
            'admin.course.index',
            compact('courses')
        );

    }





    // CREATE PAGE

    public function create()
    {

        return view(
            'admin.course.create'
        );

    }





    // STORE COURSE

    public function store(Request $request)
    {


        $request->validate([

            'title'=>'required',

            'description'=>'required',

        ]);



        Course::create([

            'title'=>$request->title,

            'description'=>$request->description

        ]);



        return redirect('/admin/course');


    }





    // EDIT

    public function edit($id)
    {

        $course = Course::findOrFail($id);


        return view(
            'admin.course.edit',
            compact('course')
        );

    }





    // UPDATE

    public function update(Request $request,$id)
    {

        $course = Course::findOrFail($id);



        $course->update([

            'title'=>$request->title,

            'description'=>$request->description

        ]);



        return redirect('/admin/course');

    }







    // DELETE

    public function destroy($id)
    {

        Course::findOrFail($id)->delete();


        return redirect('/admin/course');

    }

    public function userShow($id)
{
    $course = Course::with('lessons')->findOrFail($id);


    return view(
        'user.course.show',
        compact('course')
    );
}



}