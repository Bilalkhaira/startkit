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
        Schema::create('car_requests', function (Blueprint $table) {
            $table->id();
            $table->string('car_name')->nullable();
            $table->string('rental_type')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->longText('message')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_requests');
    }
};
