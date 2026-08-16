<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{


    protected $fillable=[

        'title',

        'description',

        'google_form_url',

        'platform',

        'quiz_url',

        'passing_score',

        'status'

    ];


}