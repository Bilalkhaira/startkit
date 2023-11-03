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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by')->nullable();
            $table->string('seller_name')->nullable();
            $table->bigInteger('seller_phone')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->bigInteger('vehicle_price')->nullable();
            $table->string('gearbox')->nullable();
            $table->string('first_registration')->nullable();
            $table->string('power')->nullable();
            $table->string('body_type')->nullable();
            $table->string('type')->nullable();
            $table->string('drivetrain')->nullable();
            $table->integer('seats')->nullable();
            $table->integer('doors')->nullable();
            $table->string('offer_number')->nullable();
            $table->string('warranty')->nullable();
            $table->string('mileage')->nullable();
            $table->string('engine_size')->nullable();
            $table->integer('gears')->nullable();
            $table->integer('cylinders')->nullable();
            $table->string('empty_weight')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('fuel_consumption_2')->nullable();
            $table->string('COemissions')->nullable();
            $table->string('emission_class')->nullable();
            $table->longText('comfort_convenience')->nullable();
            $table->longText('entertainment_media')->nullable();
            $table->longText('safety_security')->nullable();
            $table->longText('extras')->nullable();
            $table->string('colour')->nullable();
            $table->string('manufacturer_colour')->nullable();
            $table->string('upholstery_colour')->nullable();
            $table->string('upholstery')->nullable();
            $table->longText('description')->nullable();
            $table->string('service_history')->nullable();
            $table->string('non_smoker')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
