<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreignId('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('products_types');
            $table->foreignId('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('name');
            $table->decimal('price');
            $table->text('description');
            $table->integer('storaged')->default(0);
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
        Schema::dropIfExists('products');
    }
}
