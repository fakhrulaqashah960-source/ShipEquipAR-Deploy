<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('a_r_markers', function (Blueprint $table) {

    $table->id();

    $table->string('name');

    // gambar marker untuk scan
    $table->string('marker_image');

    // model kapal 3D
    $table->string('model_file');

    $table->text('description')->nullable();

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_r_markers');
    }
};
