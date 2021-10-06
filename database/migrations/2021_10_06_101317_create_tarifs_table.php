<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->decimal('min_price');
            $table->decimal('price_per_km');
            $table->decimal('price_per_minute');
            $table->integer('free_km_count');
            $table->integer('free_minute_count');
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
        Schema::dropIfExists('tarifs');
    }
}
