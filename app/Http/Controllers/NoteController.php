<?php

namespace App\Http\Controllers;

use App\Models\Note;

class NoteController extends Controller
{


    public function index()
    {

        $notes = Note::with('module')->get();


        return view(
            'user.notes.index',
            compact('notes')
        );

    }



    public function show($id)
    {

        $note = Note::with('module')
                    ->findOrFail($id);


        return view(
            'user.notes.show',
            compact('note')
        );

    }


}