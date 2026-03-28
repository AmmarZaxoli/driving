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
            $table->date('date_dr_number')->nullable();

            $table->string('invoice');

            $table->foreignId('nationality_id')
                ->constrained('nationalities')
                ->cascadeOnDelete();

            $table->foreignId('coach_id')
                ->constrained('coaches')
                ->cascadeOnDelete();

            $table->string('number_car');

            $table->integer('typecar');
            $table->integer('learn');

            $table->boolean('status')->default(0);

            $table->date('dateread')->nullable();
            $table->time('time')->nullable();
            $table->integer('statuspresence')->default(0);
            $table->integer('dayofpresence')->default(0);
            $table->string('class')->nullable();

            $table->date('datelearn')->nullable();
            $table->boolean('statuslearn')->default(0);
            $table->integer('dayoflearn')->default(0);





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
