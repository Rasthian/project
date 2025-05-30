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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim');
            $table->unsignedBigInteger('major_id');

            $table->foreign('major_id')->references('id')->on('major')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
        
    }
};
