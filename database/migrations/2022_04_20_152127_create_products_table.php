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
            $table->string('name_product')->nullable();
            $table->text('description_product')->nullable();
            $table->double('rate')->nullable();
            $table->integer('price')->nullable();
            $table->string('city')->nullable();
            $table->string('terjual')->nullable();
            $table->integer('price_coret')->nullable();
            $table->string('size_satu')->nullable();
            $table->string('size_dua')->nullable();
            $table->string('size_tiga')->nullable();
            $table->string('color_satu')->nullable();
            $table->string('color_dua')->nullable();
            $table->string('color_tiga')->nullable();
            $table->text('image_satu')->nullable();
            $table->text('image_dua')->nullable();
            $table->text('image_tiga')->nullable();
            $table->string('tags')->nullable();

            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('gudang_id')->nullable();
            $table->bigInteger('user_id')->nullable();


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
        Schema::dropIfExists('products');
    }
}
