<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_attempts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('result_id')->unique();

            $table->string('quiz_id')->nullable();

            $table->string('quiz_name')->nullable();

            $table->string('proprofs_user_id')->nullable();

            $table->string('user_name')->nullable();

            $table->string('user_email')->nullable();

            $table->unsignedInteger('total_marks')->nullable();

            $table->unsignedInteger('obtained_marks')->nullable();

            $table->decimal('percent_marks', 5, 2)->nullable();

            $table->unsignedInteger('total_correct')->nullable();

            $table->unsignedInteger('total_wrong')->nullable();

            $table->unsignedInteger('total_unanswered')->nullable();

            $table->string('time_taken')->nullable();

            $table->unsignedInteger('time_taken_in_sec')->nullable();

            $table->unsignedInteger('min_pass_marks')->nullable();

            $table->timestamp('attempted_at')->nullable();

            $table->json('raw_payload')->nullable();

            $table->timestamps();

            $table->index('user_email');
            $table->index('quiz_id');
            $table->index('attempted_at');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};