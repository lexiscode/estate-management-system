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
        Schema::create('remittances', function (Blueprint $table) {

            $table->id();
            $table->string('tenant_name');
            $table->string('apartment');
            $table->string('status');
            $table->unsignedBigInteger('rent_fee');
            $table->unsignedBigInteger('amount_paid');
            $table->date('payment_date');
            $table->unsignedBigInteger('debt_amount')->nullable(); // If debt is nullable
            $table->date('debt_due_date')->nullable(); // If debt due date is nullable
            $table->date('rent_due_date');
            $table->string('payment_method');
            $table->text('notes')->nullable(); // If notes are nullable
            $table->string('payment_proof')->nullable(); // If payment proof is nullable
            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remittances');
    }

};


