<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Module extends Model
{

    protected $fillable = [

        'title',
        'category',
        'description',
        'function',
        'image',

    ];



    public function equipments()
    {

        return $this->hasMany(
            Equipment::class
        );

    }

    public function notes()
{

    return $this->hasMany(Note::class);

}

public function ships()
{

return $this->hasMany(Ship::class);

}

public function quizzes()
{

    return $this->hasMany(Quiz::class);

}

}