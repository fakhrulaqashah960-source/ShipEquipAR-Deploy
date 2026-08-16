<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Module;


class EquipmentController extends Controller
{


    // =========================
    // ADMIN LIST EQUIPMENT
    // =========================

    public function index()
    {

        $equipments = Equipment::with('module')->get();


        return view(
            'admin.equipment.index',
            compact('equipments')
        );

    }




    // =========================
    // CREATE PAGE
    // =========================

    public function create()
    {

        $modules = Module::all();


        return view(
            'admin.equipment.create',
            compact('modules')
        );

    }




    // =========================
    // STORE EQUIPMENT
    // =========================

    public function store(Request $request)
    {


        $request->validate([

            'module_id'=>'required',

            'name'=>'required',

            'description'=>'required',

            'function'=>'required',

            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:4096',

            'model_file'=>'nullable'

        ]);



        $imageName = null;



        // IMAGE UPLOAD

        if($request->hasFile('image'))
        {

            $imageName =
            time().'_'.$request
            ->file('image')
            ->getClientOriginalName();


            $request->file('image')
            ->move(

                public_path('uploads/equipment'),

                $imageName

            );

        }




        $modelName = null;



        // AR FILE UPLOAD

        if($request->hasFile('model_file'))
        {

            $modelName =
            time().'_'.$request
            ->file('model_file')
            ->getClientOriginalName();



            $request->file('model_file')
            ->move(

                public_path('uploads/reality'),

                $modelName

            );

        }





        Equipment::create([


            'module_id'=>$request->module_id,

            'name'=>$request->name,

            'image'=>$imageName,

            'description'=>$request->description,

            'function'=>$request->function,

            'model_file'=>$modelName


        ]);





        return redirect()
            ->route('admin.equipment.index')
            ->with(
                'success',
                'Equipment Added Successfully'
            );

    }







    // =========================
    // EDIT PAGE
    // =========================

    public function edit($id)
    {


        $equipment = Equipment::findOrFail($id);


        $modules = Module::all();



        return view(

            'admin.equipment.edit',

            compact(
                'equipment',
                'modules'
            )

        );

    }








    // =========================
    // UPDATE EQUIPMENT
    // =========================

    public function update(Request $request,$id)
    {


        $equipment = Equipment::findOrFail($id);



        $request->validate([


            'module_id'=>'required',

            'name'=>'required',

            'description'=>'required',

            'function'=>'required'


        ]);





        $data = [


            'module_id'=>$request->module_id,


            'name'=>$request->name,


            'description'=>$request->description,


            'function'=>$request->function


        ];







        // UPDATE IMAGE

        if($request->hasFile('image'))
        {


            $imageName =
            time().'_'.$request
            ->file('image')
            ->getClientOriginalName();




            $request->file('image')
            ->move(

                public_path('uploads/equipment'),

                $imageName

            );



            $data['image']=$imageName;


        }









        // UPDATE AR FILE

        if($request->hasFile('model_file'))
        {


            $modelName =
            time().'_'.$request
            ->file('model_file')
            ->getClientOriginalName();




            $request->file('model_file')
            ->move(

                public_path('uploads/reality'),

                $modelName

            );



            $data['model_file']=$modelName;


        }







        $equipment->update($data);







        return redirect()

            ->route('admin.equipment.index')

            ->with(
                'success',
                'Equipment Updated Successfully'
            );


    }









    // =========================
    // DELETE EQUIPMENT
    // =========================

    public function destroy($id)
    {


        $equipment = Equipment::findOrFail($id);


        $equipment->delete();



        return redirect()

            ->route('admin.equipment.index')

            ->with(
                'success',
                'Equipment Deleted Successfully'
            );


    }









    // =========================
    // USER VIEW EQUIPMENT
    // =========================

    public function userShow($id)
    {


        $equipment = Equipment::with('module')

            ->findOrFail($id);




        return view(

            'user.equipment.show',

            compact('equipment')

        );


    }



}