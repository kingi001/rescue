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
        Schema::create('social_workers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the social worker
            $table->string('email')->unique(); // Email address
            $table->string('phone')->nullable(); // Phone number (optional)
            $table->integer('age')->nullable(); // Age column
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender column
            $table->integer('years_of_service')->nullable(); // Years of Service column
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_workers');
    }
};
