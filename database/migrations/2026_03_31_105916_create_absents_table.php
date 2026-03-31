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
        Schema::create('absents', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('techer_id') // <- points to correct table
                ->constrained('accounts')   // <- was 'accounts', fix to 'techers'
                ->cascadeOnDelete();

            $table->string('namegroup');   // required
            $table->date('date');
            $table->boolean('status');     // 0 = checked, 1 = not checked
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absents');
    }
};
