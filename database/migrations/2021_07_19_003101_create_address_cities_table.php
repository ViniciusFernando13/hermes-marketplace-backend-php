<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_state_id');
            $table->foreign('address_state_id')->references('id')->on('address_states');
            $table->string('name');
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
        Schema::dropIfExists('address_cities');
    }
}
