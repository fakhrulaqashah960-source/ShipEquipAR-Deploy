<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {

        Schema::create('notes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('module_id')
            ->constrained()
            ->cascadeOnDelete();


            $table->string('title');


            $table->text('description')
            ->nullable();


            $table->longText('content');


            $table->string('pdf_file')
            ->nullable();


            $table->timestamps();

        });

    }


    public function down(): void
    {

        Schema::dropIfExists('notes');

    }

};