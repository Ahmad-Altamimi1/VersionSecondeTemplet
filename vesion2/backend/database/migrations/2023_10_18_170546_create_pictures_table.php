<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('LASTDATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->unsignedBigInteger('REED');
            $table->string('groupId')->nullable();
            $table->string('tagId')->nullable();
            $table->longText('TITLE')->nullable();
            $table->longText('DESCRIPTION')->nullable();
            $table->string('IMG1')->nullable();
            $table->timestamp('DATE_SCHEDULER')->nullable();;
            $table->tinyInteger('DRAFT')->default('0');
            $table->tinyInteger('URGENT')->default('0');
            $table->tinyInteger('SHOW')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}