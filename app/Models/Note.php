<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    protected $fillable = [

        'title',

        'module_id',

        'icon',

        'content',

        'pdf'

    ];



    public function module()
    {

        return $this->belongsTo(Module::class);

    }


}