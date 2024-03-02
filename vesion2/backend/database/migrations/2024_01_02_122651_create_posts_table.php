<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DATE_SCHEDULER')->nullable();

            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('Update_DATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->unsignedBigInteger('REED');
            $table->unsignedBigInteger('groupId');
            $table->unsignedBigInteger('tagId');
            $table->longText('TITLE');
            $table->longText('DESCRIPTION')->nullable();
            $table->string('PIC_Name')->nullable();
            $table->string('REFERENCES')->nullable();
            $table->string('Main_IMG')->nullable();
            $table->longText('TEXT1')->nullable();
            $table->tinyInteger('DRAFT')->default('0');
            $table->tinyInteger('URGENT')->default('0');
            $table->tinyInteger('archive')->default('0');
            $table->tinyInteger('SHOW')->default('0');
            $table->index('id');    
            // $table->foreign('groupId')->references('id')->on('groups')->onDelete('set null');
            // $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
