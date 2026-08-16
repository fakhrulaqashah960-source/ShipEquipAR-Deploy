<?php

namespace App\Http\Controllers;


use App\Models\Ship;

use Illuminate\Http\Request;



class ShipController extends Controller
{


    public function index()
    {

        $ships = Ship::all();


        return view(
            'admin.ships.index',
            compact('ships')
        );

    }





    public function create()
    {

        return view('admin.ships.create');

    }





    public function store(Request $request)
    {


        $request->validate([

            'name'=>'required',

            'description'=>'nullable',

            'image'=>'nullable|image',

            'ar_model'=>'nullable'

        ]);





        $image = null;

        $arModel = null;






        // SAVE IMAGE

        if($request->hasFile('image'))
        {


            $image = time().'_'.$request
                    ->file('image')
                    ->getClientOriginalName();



            $request->file('image')
            ->move(

                public_path('uploads/ships'),

                $image

            );


        }







        // SAVE AR FILE

        if($request->hasFile('ar_model'))
        {


            $arModel = time().'_'.$request
                    ->file('ar_model')
                    ->getClientOriginalName();



            $request->file('ar_model')
            ->move(

                public_path('uploads/ships/ar'),

                $arModel

            );


        }







        Ship::create([


            'name'=>$request->name,


            'description'=>$request->description,


            'image'=>$image,


            'ar_model'=>$arModel


        ]);








        return redirect()

            ->route('admin.ships.index')

            ->with(
                'success',
                'Type of Ship Added Successfully'
            );


    }

    public function show($id)
{

    $ship = Ship::findOrFail($id);


    return view(
        'admin.ships.show',
        compact('ship')
    );

}

public function edit($id)
{

    $ship = Ship::findOrFail($id);


    return view(
        'admin.ships.edit',
        compact('ship')
    );

}

public function update(Request $request, $id)
{


    $ship = Ship::findOrFail($id);



    $ship->update([

        'name'=>$request->name,

        'description'=>$request->description

    ]);



    return redirect()
        ->route('admin.ships.index')
        ->with(
            'success',
            'Ship updated successfully'
        );


}

public function destroy($id)
{

    $ship = \App\Models\Ship::findOrFail($id);


    $ship->delete();


    return redirect()
        ->route('admin.ships.index')
        ->with(
            'success',
            'Ship deleted successfully'
        );

}



}