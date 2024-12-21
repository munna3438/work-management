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
        Schema::create('student_limits', function (Blueprint $table) {
            $table->id();
            $table->string('instituteID')->nullable();
            $table->string('referName')->nullable();
            $table->string('oldLimit')->nullable();
            $table->string('newLimit')->nullable();
            $table->string('document')->nullable();
            $table->string('bill')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_limits');
    }
};
