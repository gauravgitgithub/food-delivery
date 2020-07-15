<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->string('short_desc')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('state');
            $table->integer('state_id');
            $table->string('city');
            $table->integer('city_id');
            $table->string('locality');
            $table->integer('locality_id');
            $table->string('cover_image_url')->nullable();
            $table->string('logo_image_url')->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
