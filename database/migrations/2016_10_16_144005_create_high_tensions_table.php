<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighTensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('high_tensions', function (Blueprint $table) {
            $table->string('name');
            $table->string('high_tension_nerc_code', 4);
            $table->string('high_tension_kaedc_code', 4);
            $table->string('feeder_nerc_code');
            $table->string('feeder_kaedc_code');
            $table->string('injection_nerc_code');
            $table->string('injection_kaedc_code');
            $table->string('area_office_nerc_code');
            $table->string('area_office_kaedc_code');
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
        Schema::dropIfExists('high_tensions');
    }
}
