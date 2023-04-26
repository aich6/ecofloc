<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('Number');
            $table->BigInteger('Year');
            $table->String('PRODUCT');
            $table->String('CONDUCTOR_TYPE');
            $table->String('SINGLE_MULTICORE');
            $table->String('SHIELDED_UNSHIELDED');
            $table->String('SHIELDING_TYPE')->nullable();
            $table->String('INSULATION_TYPE');
            $table->String('INSULATION_THICKNESS');
            $table->String('VOLTAGE_LEVEL');
            $table->String('ABRASION');
            $table->String('CHEMICAL_RESISTANCE');
            $table->String('FLEXIBILITY');
            $table->String('TEMPERATURE_CLASS');
            $table->String('image')->nullable();
            $table->String('image_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
