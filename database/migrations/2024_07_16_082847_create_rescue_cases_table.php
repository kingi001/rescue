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
        Schema::create('rescue_cases', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('case_title'); // Title of the case
            $table->date('rescue_date'); // Date of rescue
            $table->string('location'); // Location of the case
            $table->text('description'); // Description of the case
            $table->foreignId('assigned_social_worker_id')->constrained('social_workers'); // Foreign key
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_cases');
    }
};
