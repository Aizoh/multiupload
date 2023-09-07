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
        //
        Schema::create('confirm_order', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->email('user_email');
            $table->timestamps();
            $table->string('description');
            $table->enum('status', ['confirmed', 'pending', 'unconfirmed']); // Use enum for a set of predefined values
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('confirm_order');
    }
};
