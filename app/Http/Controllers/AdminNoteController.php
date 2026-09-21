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
    | Create
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
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {


        $request->validate([

            'title'=>'required',

            'module_id'=>'required',

            'content'=>'required',

            'pdf'=>'nullable|mimes:pdf|max:20000'

        ]);



        $pdf = null;



        if($request->hasFile('pdf'))
        {


            $pdf = $this->uploadPDF(
                $request->file('pdf')
            );


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
    | Show
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
    | Edit
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
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request,$id)
    {


        $note = Note::findOrFail($id);




        $request->validate([


            'title'=>'required',

            'module_id'=>'required',

            'content'=>'required',

            'pdf'=>'nullable|mimes:pdf|max:20000'


        ]);




        $pdf = $note->pdf;





        if($request->hasFile('pdf'))
        {


            // delete old pdf

            if($note->pdf)
            {

                $old =
                public_path($note->pdf);


                if(File::exists($old))
                {

                    File::delete($old);

                }

            }





            // upload new pdf

            $pdf =
            $this->uploadPDF(
                $request->file('pdf')
            );


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
    | Delete
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







    /*
    |--------------------------------------------------------------------------
    | Upload PDF Helper
    |--------------------------------------------------------------------------
    */

    private function uploadPDF($file)
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




        $filename =

        time()
        .'_'
        .
        preg_replace(
            '/[^A-Za-z0-9_\-\.]/',
            '_',
            $file->getClientOriginalName()
        );





        $file->move(
            $folder,
            $filename
        );





        return
        'uploads/notes/'.$filename;


    }





}