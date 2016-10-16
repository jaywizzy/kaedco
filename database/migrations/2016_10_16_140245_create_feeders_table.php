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
        Schema::dropIfExists('feeders');
    }
}
