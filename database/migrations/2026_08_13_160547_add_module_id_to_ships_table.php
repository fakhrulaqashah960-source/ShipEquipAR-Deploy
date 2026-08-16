<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('ships', function (Blueprint $table) {

        $table->foreignId('module_id')
        ->nullable()
        ->after('id')
        ->constrained()
        ->cascadeOnDelete();

    });
}



public function down()
{
    Schema::table('ships', function (Blueprint $table) {

        $table->dropForeign(['module_id']);

        $table->dropColumn('module_id');

    });
}
};
