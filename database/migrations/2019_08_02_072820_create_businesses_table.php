<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('tagline')->nullable();
            $table->tinyInteger('business_type');
            $table->tinyInteger('account_type');
            $table->unsignedBigInteger('category_id')->index();
            $table->date('expires_at')->nullable();
            $table->unsignedBigInteger('city_id')->index();
            $table->string('address');
            $table->string('contact_one')->nullable();
            $table->string('contact_two')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('map_id')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('google_link')->nullable();
            $table->string('description_title')->nullable();
            $table->text('description')->nullable();
            $table->string('services_title')->nullable();
            $table->text('services')->nullable();
            $table->string('thumbnail')->nullable()->default('no_image.jpg');
            $table->string('profile_pic')->nullable()->default('no_image.jpg');
            $table->string('cover_pic')->nullable()->default('no_image.jpg');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->softDeletes();
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
        Schema::dropIfExists('businesses');
    }
}
