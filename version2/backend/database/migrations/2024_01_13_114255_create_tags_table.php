<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->longText('TITLE');
            $table->longText('DESCRIPTION')->nullable();
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('Update_DATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->string('order')->default(0);
            $table->unsignedBigInteger('EDITOR');
            $table->unsignedBigInteger('parentId')->nullable();
            // $table->unsignedBigInteger('groupId')->nullable();
            $table->string('IMG')->nullable();
            $table->string('COLOR')->nullable();
            $table->longText('TEXT')->nullable();
            $table->unsignedBigInteger('REED');
            $table->string('FACEBOOK')->nullable();
            $table->string('YOUTUBE')->nullable();
            $table->string('TWITTER')->nullable();
            $table->string('INSTAGRAM')->nullable();
            $table->foreign('parentId')->references('id')->on('tags')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}