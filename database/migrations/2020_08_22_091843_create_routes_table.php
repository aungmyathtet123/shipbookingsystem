<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_from');
            $table->unsignedBigInteger('city_to');
            $table->unsignedBigInteger('ship_id');
            $table->string('time');
            $table->integer('lower_price');

            $table->integer('upper_price');
            $table->timestamps();


            $table->foreign('city_from')
                  ->references('id')->on('cities')
                  ->onDelete('cascade');

          $table->foreign('city_to')
                  ->references('id')->on('cities')
                  ->onDelete('cascade');

          $table->foreign('ship_id')
                  ->references('id')->on('ships')
                  ->onDelete('cascade');

            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
