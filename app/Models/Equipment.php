<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{

    protected $fillable = [

        'module_id',
        'name',
        'image',
        'description',
        'function',
        'model_file'

    ];



    public function module()
    {

        return $this->belongsTo(
            Module::class
        );

    }

}