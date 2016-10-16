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
            $table->string('high_tension_code', 4);
            $table->string('feeder_code_nerc');
            $table->string('feeder_code_kaedc');
            $table->string('injection_code_nerc');
            $table->string('injection_code_kaedc');
            $table->string('area_office_code_nerc');
            $table->string('area_office_code_kaedc');
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
