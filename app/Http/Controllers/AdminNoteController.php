<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Module;

class AdminNoteController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Display Notes
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $notes = Note::with('module')->get();

        return view('admin.notes.index', compact('notes'));

    }



    /*
    |--------------------------------------------------------------------------
    | Create Page
    |--------------------------------------------------------------------------
    */

    public function create()
    {

        $modules = Module::all();


        return view(
            'admin.notes.create',
            compact('modules')
        );

    }




    /*
    |--------------------------------------------------------------------------
    | Store Notes
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {


        $request->validate([

            'title' => 'required',

            'module_id' => 'required',

            'content' => 'required',

            'pdf' => 'nullable|mimes:pdf|max:10000'

        ]);




        $pdf = null;



        if($request->hasFile('pdf'))
        {


            $pdf = $request->file('pdf')
                ->store('notes','public');


        }





        Note::create([


            'title' => $request->title,


            'module_id' => $request->module_id,


            'content' => $request->content,


            'pdf' => $pdf



        ]);






        return redirect()

            ->route('admin.notes.index')

            ->with(
                'success',
                'Notes added successfully'
            );


    }






    /*
    |--------------------------------------------------------------------------
    | Show Notes
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {


        $note = Note::with('module')
            ->findOrFail($id);



        return view(
            'admin.notes.show',
            compact('note')
        );


    }






    /*
    |--------------------------------------------------------------------------
    | Edit Notes
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {


        $note = Note::findOrFail($id);


        $modules = Module::all();



        return view(
            'admin.notes.edit',
            compact(
                'note',
                'modules'
            )
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Update Notes
    |--------------------------------------------------------------------------
    */

    public function update(Request $request,$id)
    {


        $note = Note::findOrFail($id);



        $request->validate([

            'title'=>'required',

            'module_id'=>'required',

            'content'=>'required',

            'pdf'=>'nullable|mimes:pdf|max:10000'

        ]);



        $pdf = $note->pdf;



        if($request->hasFile('pdf'))
        {


            $pdf = $request->file('pdf')
                ->store('notes','public');


        }





        $note->update([


            'title'=>$request->title,


            'module_id'=>$request->module_id,


            'content'=>$request->content,


            'pdf'=>$pdf


        ]);




        return redirect()

            ->route('admin.notes.index')

            ->with(
                'success',
                'Notes updated successfully'
            );


    }







    /*
    |--------------------------------------------------------------------------
    | Delete Notes
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {


        $note = Note::findOrFail($id);


        $note->delete();



        return redirect()

            ->route('admin.notes.index')

            ->with(
                'success',
                'Notes deleted successfully'
            );


    }



}