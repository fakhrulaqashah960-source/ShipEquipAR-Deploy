<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Module;
use App\Models\Ship;


class ModuleController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | ADMIN MODULE LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $modules = Module::all();


        return view(
            'admin.modules.index',
            compact('modules')
        );

    }





    /*
    |--------------------------------------------------------------------------
    | ADMIN VIEW EQUIPMENT
    |--------------------------------------------------------------------------
    */

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





    /*
    |--------------------------------------------------------------------------
    | ADMIN CREATE MODULE
    |--------------------------------------------------------------------------
    */

    public function create()
    {

        return view(
            'admin.modules.create'
        );

    }





    /*
    |--------------------------------------------------------------------------
    | ADMIN STORE MODULE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required',

            'category' => 'required',

            'description' => 'required',

            'function' => 'nullable',

            'image' => 'nullable|image'

        ]);



        $imageName = null;



        if ($request->hasFile('image')) {


            $imageName =
                time() . '_' .
                $request->image
                    ->getClientOriginalName();



            $request->image->move(

                public_path(
                    'images/modules'
                ),

                $imageName

            );

        }



        Module::create([

            'title' =>
                $request->title,

            'category' =>
                $request->category,

            'description' =>
                $request->description,

            'function' =>
                $request->function,

            'image' =>
                $imageName

        ]);



        return redirect('/admin/modules')

            ->with(
                'success',
                'Module Added Successfully'
            );

    }





    /*
    |--------------------------------------------------------------------------
    | ADMIN EDIT MODULE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {

        $module =
            Module::findOrFail($id);


        return view(

            'admin.modules.edit',

            compact('module')

        );

    }





    /*
    |--------------------------------------------------------------------------
    | ADMIN UPDATE MODULE
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Module $module
    ) {

        $request->validate([

            'title' =>
                'required',

            'category' =>
                'required',

            'description' =>
                'required',

            'function' =>
                'required',

            'image' =>
                'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);



        $data = [

            'title' =>
                $request->title,

            'category' =>
                $request->category,

            'description' =>
                $request->description,

            'function' =>
                $request->function,

        ];



        /*
        |--------------------------------------------------------------------------
        | UPDATE IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {


            /*
            |--------------------------------------------------------------------------
            | DELETE OLD IMAGE
            |--------------------------------------------------------------------------
            */

            if (
                $module->image &&
                file_exists(
                    public_path(
                        'uploads/modules/' .
                        $module->image
                    )
                )
            ) {

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
                time() .
                '_' .
                $image->getClientOriginalName();



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





    /*
    |--------------------------------------------------------------------------
    | ADMIN DELETE MODULE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {

        $module =
            Module::findOrFail($id);


        $module->delete();


        return redirect(
            '/admin/modules'
        );

    }





    /*
    |--------------------------------------------------------------------------
    | USER INTRO PAGE
    |--------------------------------------------------------------------------
    */

    public function intro($id)
    {

        $module =
            Module::findOrFail($id);


        return view(

            'user.modules.intro',

            compact('module')

        );

    }





    /*
    |--------------------------------------------------------------------------
    | USER MODULE PAGE
    |--------------------------------------------------------------------------
    |
    | Page:
    | /learning-module/{id}
    |
    | Equipment datang daripada relationship module.
    |
    | Ship pula datang daripada table ships.
    | Data ships akan digunakan oleh Ship Model module
    | untuk paparkan:
    |
    | - Bulk Carrier
    | - Container Vessel
    | - ship lain yang admin tambah
    |
    |--------------------------------------------------------------------------
    */

    public function userShow($id)
    {

        /*
        |--------------------------------------------------------------------------
        | GET MODULE + EQUIPMENT
        |--------------------------------------------------------------------------
        */

        $module =
            Module::with('equipments')
                ->findOrFail($id);



        /*
        |--------------------------------------------------------------------------
        | GET SHIPS FROM DATABASE
        |--------------------------------------------------------------------------
        |
        | Ini yang sebelum ini tiada.
        |
        | Semua ship yang admin tambah akan dihantar
        | ke user.modules.show.
        |
        */

        $ships =
            Ship::orderBy(
                'id',
                'asc'
            )->get();



        /*
        |--------------------------------------------------------------------------
        | SEND DATA TO USER MODULE PAGE
        |--------------------------------------------------------------------------
        */

        return view(

            'user.modules.show',

            compact(
                'module',
                'ships'
            )

        );

    }





    /*
    |--------------------------------------------------------------------------
    | USER VIDEO PAGE
    |--------------------------------------------------------------------------
    */

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