<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransformersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transformers', function (Blueprint $table) {
            $table->string('name');
            $table->string('transformer_nerc_code', 3);
            $table->string('transformer_kaedc_code', 6);
            $table->string('hightension_code_nerc');
            $table->string('hightension_code_kaedc');
            $table->string('injection_code_nerc');
            $table->string('injection_code_kaedc');
            $table->string('feeder_code_nerc');
            $table->string('feeder_code_kaedc');
            $table->string('areaoffice_code_nerc');
            $table->string('areaoffice_code_kaedc');
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
        Schema::dropIfExists('transformers');
    }
}
