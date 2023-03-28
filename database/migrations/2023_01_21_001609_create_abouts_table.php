<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about-us', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_ar');
            $table->text('desc_en');
            $table->text('desc_ar');
            $table->string('image');
            $table->string('video');
            $table->string('address_en');
            $table->string('address_ar');
            $table->string('email');
            $table->string('phone');
            $table->text('location');
            $table->json('projects_info');
            $table->json('social');
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
        Schema::dropIfExists('about-us');
    }
};
