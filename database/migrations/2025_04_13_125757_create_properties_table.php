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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('special_note')->nullable();
            $table->string('date')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->string('premise')->nullable();
            $table->string('area')->nullable();
            $table->string('rent')->nullable();
            $table->string('availability')->nullable();
            $table->string('condition')->nullable();
            $table->string('sqFt_sqyd')->nullable();
            $table->string('key')->nullable();
            $table->string('brokerage')->nullable();
            $table->text('property_status')->nullable();
            $table->text('description_1')->nullable();
            $table->string('description_2')->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('property_type_id');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');   
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');   
            $table->boolean('status')->default(1)->comment('1 = active, 0 = deactive');       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
