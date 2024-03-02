<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('Update_DATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->unsignedBigInteger('REED');
            // $table->string('TOPIC')->nullable();
            // $table->string('TAG')->nullable();
            $table->longText('TITLE');
            $table->longText('DESCRIPTION')->nullable();
            $table->string('IMG')->nullable();
            $table->string('VID')->nullable();
            $table->longText('TEXT1')->nullable();
            $table->longText('TEXT2')->nullable();
            $table->longText('TEXT3')->nullable();
            $table->tinyInteger('DRAFT')->default('0');
            $table->tinyInteger('URGENT')->default('0');
            $table->tinyInteger('SHOW')->default('0');
            $table->unsignedBigInteger('groupId');
            $table->unsignedBigInteger('tagId');
            $table->timestamp('DATE_SCHEDULER')->nullable();

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
        Schema::dropIfExists('videos');
    }
}
