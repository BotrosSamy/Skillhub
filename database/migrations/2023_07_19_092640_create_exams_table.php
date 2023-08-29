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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('desc');
            $table->string('img',50);
            $table->tinyInteger('question_no');
            $table->tinyInteger('difficulty');
            $table->smallInteger('duration_mins');
            $table->foreignId('skill_id')->constrained();
            $table->foreignId('cat_id')->constrained(); 

            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
