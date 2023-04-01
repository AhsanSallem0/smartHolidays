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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('customerId')->nullable();
            $table->string('customerName')->nullable();
            $table->string('customerEmail')->nullable();
            $table->string('customerAddress')->nullable();
            $table->string('customerPhone')->nullable();
            $table->string('passengerCount')->nullable();
            $table->string('purchsasePrice')->nullable();
            $table->string('salePrice')->nullable();
            $table->string('profit')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->string('paymentRecieved')->nullable();
            $table->string('paymentRemaining')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
