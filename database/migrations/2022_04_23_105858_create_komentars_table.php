<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->string('name_comment')->nullable();
            $table->string('status_comment')->nullable();
            $table->string('category')->nullable();
            $table->double('rate_comment')->nullable();
            $table->text('comment')->nullable();
            $table->text('comment_admin')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->text('photo_comment')->nullable();
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
        Schema::dropIfExists('komentars');
    }
}
