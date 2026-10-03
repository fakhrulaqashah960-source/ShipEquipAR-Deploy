<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Module;
use App\Models\Ship;



class ModuleController extends Controller
{


    public function index()
    {

        $modules = Module::all();


        return view(
            'admin.modules.index',
            compact('modules')
        );

    }





    public function equipment($id)
    {

        $module = Module::with('equipments')
            ->findOrFail($id);


        $equipments = $module->equipments;


        return view(
            'admin.modules.equipment',
            compact(
                'module',
                'equipments'
            )
        );

    }





    public function create()
    {

        return view(
            'admin.modules.create'
        );

    }





    public function store(Request $request)
    {


        $request->validate([

            'title'=>'required',

            'category'=>'required',

            'description'=>'required',

            'function'=>'nullable',

            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);




        $imageName = null;



        if($request->hasFile('image')){


            $image = $request->file('image');



            $imageName =

                Str::slug(

                    pathinfo(
                        $image->getClientOriginalName(),
                        PATHINFO_FILENAME
                    )

                )

                .

                '.'

                .

                $image->getClientOriginalExtension();




            $image->move(

                public_path(
                    'uploads/modules'
                ),

                $imageName

            );


        }





        Module::create([


            'title'=>$request->title,


            'category'=>$request->category,


            'description'=>$request->description,


            'function'=>$request->function,


            'image'=>$imageName


        ]);





        return redirect('/admin/modules')

            ->with(
                'success',
                'Module Added Successfully'
            );

    }





    public function edit($id)
    {


        $module =
            Module::findOrFail($id);



        return view(

            'admin.modules.edit',

            compact('module')

        );

    }





    public function update(
        Request $request,
        Module $module
    ) {


        $request->validate([


            'title'=>'required',


            'category'=>'required',


            'description'=>'required',


            'function'=>'required',


            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'


        ]);





        $data = [


            'title'=>$request->title,


            'category'=>$request->category,


            'description'=>$request->description,


            'function'=>$request->function,


        ];







        if($request->hasFile('image')){



            /*
             DELETE OLD IMAGE
            */


            if(

                $module->image &&

                file_exists(

                    public_path(
                        'uploads/modules/' .
                        $module->image
                    )

                )

            ){

                unlink(

                    public_path(
                        'uploads/modules/' .
                        $module->image
                    )

                );

            }







            $image =
                $request->file('image');




            $imageName =


                Str::slug(

                    pathinfo(

                        $image->getClientOriginalName(),

                        PATHINFO_FILENAME

                    )

                )

                .

                '.'

                .

                $image->getClientOriginalExtension();







            $image->move(

                public_path(
                    'uploads/modules'
                ),

                $imageName

            );





            $data['image'] =
                $imageName;



        }






        $module->update($data);






        return redirect()

            ->route('modules.index')

            ->with(
                'success',
                'Module updated successfully'
            );


    }







    public function destroy($id)
    {


        $module =
            Module::findOrFail($id);



        if(

            $module->image &&

            file_exists(

                public_path(
                    'uploads/modules/' .
                    $module->image
                )

            )

        ){

            unlink(

                public_path(
                    'uploads/modules/' .
                    $module->image
                )

            );

        }




        $module->delete();



        return redirect(
            '/admin/modules'
        );


    }







    public function intro($id)
    {


        $module =
            Module::findOrFail($id);



        return view(

            'user.modules.intro',

            compact('module')

        );


    }







    public function userShow($id)
    {


        $module =

            Module::with('equipments')

            ->findOrFail($id);






        $ships =

            Ship::orderBy(
                'id',
                'asc'
            )

            ->get();







        return view(

            'user.modules.show',

            compact(
                'module',
                'ships'
            )

        );


    }







    public function video($id)
    {


        $module =
            Module::findOrFail($id);



        return view(

            'user.modules.video',

            compact('module')

        );


    }



}