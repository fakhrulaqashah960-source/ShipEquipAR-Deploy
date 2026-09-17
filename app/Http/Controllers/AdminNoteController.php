<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Module;
use Illuminate\Support\Facades\File;


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

        return view(
            'admin.notes.index',
            compact('notes')
        );

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

            'pdf' => 'nullable|mimes:pdf|max:20000'

        ]);



        $pdf = null;



        if($request->hasFile('pdf'))
        {


            $folder = public_path('uploads/notes');


            if(!File::exists($folder))
            {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );

            }



            $file = $request->file('pdf');


            $filename =
                time()
                .'_'
                .preg_replace(
                    '/[^A-Za-z0-9_\-\.]/',
                    '_',
                    $file->getClientOriginalName()
                );



            $file->move(
                $folder,
                $filename
            );



            $pdf =
                'uploads/notes/'.$filename;


        }





        Note::create([


            'title'=>$request->title,


            'module_id'=>$request->module_id,


            'content'=>$request->content,


            'pdf'=>$pdf


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


        $note =
            Note::with('module')
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


        $note =
            Note::findOrFail($id);



        $modules =
            Module::all();



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


        $note =
            Note::findOrFail($id);




        $request->validate([


            'title'=>'required',


            'module_id'=>'required',


            'content'=>'required',


            'pdf'=>'nullable|mimes:pdf|max:20000'


        ]);




        $pdf =
            $note->pdf;






        if($request->hasFile('pdf'))
        {


            $folder =
                public_path('uploads/notes');



            if(!File::exists($folder))
            {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );

            }




            $file =
                $request->file('pdf');



            $filename =
                time()
                .'_'
                .preg_replace(
                    '/[^A-Za-z0-9_\-\.]/',
                    '_',
                    $file->getClientOriginalName()
                );




            $file->move(
                $folder,
                $filename
            );




            $pdf =
                'uploads/notes/'.$filename;



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


        $note =
            Note::findOrFail($id);



        if($note->pdf)
        {


            $file =
                public_path($note->pdf);



            if(File::exists($file))
            {

                File::delete($file);

            }


        }





        $note->delete();





        return redirect()

            ->route('admin.notes.index')

            ->with(
                'success',
                'Notes deleted successfully'
            );


    }



}