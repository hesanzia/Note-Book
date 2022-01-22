<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('volume');
            $table->string('language');
            $table->unsignedBigInteger('writer_id');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('translator_id');
            $table->string('picture');
            $table->string('link');
            $table->timestamps();
            $table->foreign('writer_id')->references('id')->on('writers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('translator_id')->references('id')->on('translators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
