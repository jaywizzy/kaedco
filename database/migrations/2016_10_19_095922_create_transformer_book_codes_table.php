<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransformerBookCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transformer_book_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transcode');
            $table->integer('bookcode');
            $table->integer('area_office_nerc');
            $table->integer('area_office_kaedc');
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
        Schema::dropIfExists('transformer_book_codes');
    }
}
