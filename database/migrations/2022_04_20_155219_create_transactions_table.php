<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('total')->nullable();
            $table->string('status')->nullable();
            $table->text('payment_url')->nullable();
            $table->text('no_resi')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->text('address')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('phone')->nullable();
            $table->string('pengiriman')->nullable();
            $table->text('image_product')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
