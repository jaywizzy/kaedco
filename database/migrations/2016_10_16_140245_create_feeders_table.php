<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeders', function (Blueprint $table) {
            $table->string('name');
            $table->string('feeder_code', 2);
            $table->string('injection_code_nerc')->unsigned();
            $table->foreign('injection_code_nerc')->references('nerc_code')->on('area_offices');
            
            $table->string('injection_code_kaedc')->unsigned();
            $table->foreign('injection_code_nerc')->references('nerc_code')->on('area_offices');

            $table->string('area_office_code_nerc')->unsigned();
            $table->foreign('area_office_code_nerc')->references('nerc_code')->on('area_offices');

            $table->string('area_office_code_kaedc')->unsigned();
            $table->foreign('area_office_code_kaedc')->references('kaedc_code')->on('area_offices');
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
        Schema::dropIfExists('feeders');
    }
}
