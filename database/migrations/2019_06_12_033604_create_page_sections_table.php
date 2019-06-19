<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('page_id');
            $table->string('title')->nullable();
            $table->string('tagline')->nullable();
            $table->string('content')->nullable();
            $table->unsignedInteger('media_id')->nullable();
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_sections');
    }
}
