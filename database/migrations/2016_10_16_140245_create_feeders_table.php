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
            $table->string('feeder_nerc_code', 2);
            $table->string('feeder_kaedc_code', 2);
            $table->string('injection_code_nerc', 3);
            $table->string('injection_code_kaedc', 3);
            $table->string('area_office_code_nerc', 2);
            $table->string('area_office_code_kaedc', 2);
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
