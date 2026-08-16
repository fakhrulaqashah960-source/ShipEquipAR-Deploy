<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

public function up()
{

Schema::create('quizzes', function (Blueprint $table) {


$table->id();


$table->foreignId('module_id')
->constrained()
->cascadeOnDelete();



$table->string('title');


$table->string('platform');


$table->text('quiz_url');


$table->integer('passing_score')
->default(80);



$table->string('status')
->default('Active');



$table->timestamps();



});

}



public function down()
{

Schema::dropIfExists('quizzes');

}


};