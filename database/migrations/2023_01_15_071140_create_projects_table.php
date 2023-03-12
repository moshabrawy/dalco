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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('owner_en');
            $table->string('owner_ar');
            $table->string('duration_en');
            $table->string('duration_ar');
            $table->date('date');
            $table->string('price');
            $table->enum('type_en', ['Direct', 'In Direct']);
            $table->enum('type_ar', ['مباشر', 'غير مباشر']);
            $table->enum('status_en', ['Done', 'In Process']);
            $table->enum('status_ar', ['منتهية', 'جارية']);
            $table->text('description_en');
            $table->text('description_ar');
            $table->json('gallery')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
