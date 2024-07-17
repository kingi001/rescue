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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->text('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('medical_history')->nullable();
            $table->bigInteger('assigned_social_worker_id')->unsigned()->nullable();
            $table->bigInteger('rescue_case_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('assigned_social_worker_id')
                  ->references('id')
                  ->on('social_workers')
                  ->onDelete('set null');

            $table->foreign('rescue_case_id')
                  ->references('id')
                  ->on('rescue_cases')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
};
