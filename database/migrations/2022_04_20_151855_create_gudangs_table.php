<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id();
            $table->string('name_gudang')->nullable();
            $table->string('address_gudang')->nullable();
            $table->double('latitude_gudang')->nullable();
            $table->double('longitude_gudang')->nullable();
            $table->text('photo_gudang')->nullable();
            $table->string('status')->nullable();
            $table->string('promo')->nullable();
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
        Schema::dropIfExists('gudangs');
    }
}
