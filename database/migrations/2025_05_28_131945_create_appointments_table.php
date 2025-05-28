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
             Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->string('patient_name'); // usually a user
            $table->date('appointment_date');
            $table->string('patient_image')->nullable();
            $table->string('type')->nullable();
            $table->time('appointment_time');
            $table->string('status')->default('pending'); // e.g. pending, confirmed, cancelled
            $table->timestamps();

        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
