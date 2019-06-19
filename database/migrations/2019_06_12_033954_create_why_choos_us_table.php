<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhyChoosUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why_choos_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content')->nullable();
            $table->unsignedInteger('media_id')->nullable();
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('why_choos_us');
    }
}
