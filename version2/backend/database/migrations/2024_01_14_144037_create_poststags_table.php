<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoststagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poststags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('postId');
            $table->unsignedBigInteger('tagId');
            // $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');
            // $table->foreign('postId')->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('poststags');
    }
}
