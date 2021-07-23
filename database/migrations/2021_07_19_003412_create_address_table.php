<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_city_id');
            $table->foreign('address_city_id')->references('id')->on('address_cities');
            $table->morphs('addressable');
            $table->string('name');
            $table->string('neighborhood');
            $table->integer('number');
            $table->string('zipcode');
            $table->string('complement')->nullable();
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
        Schema::dropIfExists('address');
    }
}
