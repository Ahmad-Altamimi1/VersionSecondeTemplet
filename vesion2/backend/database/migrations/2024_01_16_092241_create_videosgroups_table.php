<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videosgroups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('videoId');
            $table->unsignedBigInteger('tagId');
            // $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');
            // $table->foreign('videoId')->references('id')->on('videos')->onDelete('cascade');
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
        Schema::dropIfExists('videosgroups');
    }
}
