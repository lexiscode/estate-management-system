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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->integer('bedroom')->nullable();
            $table->integer('livingroom')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('kitchen')->nullable();
            $table->integer('waitingroom')->nullable();
            $table->integer('studyroom')->nullable();
            $table->integer('storeroom')->nullable();
            $table->integer('laundryroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('diningroom')->nullable();
            $table->integer('balcony')->nullable();
            $table->integer('guestroom')->nullable();
            $table->integer('closets')->nullable();
            $table->integer('pantry')->nullable();
            // Add foreign key for the one-to-one relationship
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};

