<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_costumers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('document');
            $table->date('birthday');
            $table->string('phone');
            $table->timestamps();
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
        Schema::dropIfExists('users_costumers');
    }
}
