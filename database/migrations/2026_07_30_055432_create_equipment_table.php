<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

public function up(): void
{

Schema::create('equipment', function(Blueprint $table){

$table->id();


$table->foreignId('module_id')
->constrained()
->cascadeOnDelete();


$table->string('name');


$table->string('image')
->nullable();


$table->text('description');


$table->text('function');


$table->string('model_file')
->nullable();


$table->timestamps();


});


}



public function down(): void
{

Schema::dropIfExists('equipment');

}


};