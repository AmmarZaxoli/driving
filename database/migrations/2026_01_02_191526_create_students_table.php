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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('mother_name');

            $table->date('birthday');
            $table->string('location');

            $table->string('mobile_number');

            $table->date('date_join');
            $table->date('date_dr_number');

            $table->string('invoice');

            $table->foreignId('nationality_id')
                ->constrained('nationalities')
                ->cascadeOnDelete();

            $table->foreignId('coach_id')
                ->constrained('coaches')
                ->cascadeOnDelete();

            $table->string('number_car');

            $table->boolean('typecar'); 
            $table->boolean('learn');   
            $table->boolean('status');   
            $table->boolean('dayoflearn');   

            $table->date('data_start');
            $table->date('date_learn');
            $table->time('time')->nullable();
            $table->time('time2')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
