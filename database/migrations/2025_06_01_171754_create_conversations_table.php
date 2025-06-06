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
      Schema::create('conversations', function (Blueprint $table) {
    $table->id();  // unsignedBigInteger primary key
    $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
    $table->timestamp('last_time_message')->nullable();
    $table->timestamps();
    $table->softDeletes();

});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversations');
    }
};
