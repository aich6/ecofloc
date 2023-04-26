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
        Schema::table('products',function(Blueprint $table){
            $table->String('icon_CONDUCTOR_TYPE')->nullable();
            $table->String('icon_SINGLE_MULTICORE')->nullable();
            $table->String('icon_SHIELDED_UNSHIELDED')->nullable();
            $table->String('icon_SHIELDING_TYPE')->nullable();
            $table->String('icon_INSULATION_TYPE')->nullable();
            $table->String('icon_INSULATION_THICKNESS')->nullable();
            $table->String('icon_VOLTAGE_LEVEL')->nullable();
            $table->String('icon_ABRASION')->nullable();
            $table->String('icon_CHEMICAL_RESISTANCE')->nullable();
            $table->String('icon_FLEXIBILITY')->nullable();
            $table->String('icon_TEMPERATURE_CLASS')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('icon_CONDUCTOR_TYPE');
            $table->dropColumn('icon_SINGLE_MULTICORE');
            $table->dropColumn('icon_SHIELDED_UNSHIELDED');
            $table->dropColumn('icon_SHIELDING_TYPE');
            $table->dropColumn('icon_INSULATION_TYPE');
            $table->dropColumn('icon_INSULATION_THICKNESS');
            $table->dropColumn('icon_VOLTAGE_LEVEL');
            $table->dropColumn('icon_ABRASION');
            $table->dropColumn('icon_CHEMICAL_RESISTANCE');
            $table->dropColumn('icon_FLEXIBILITY');
            $table->dropColumn('icon_TEMPERATURE_CLASS');

         });
    }
};
