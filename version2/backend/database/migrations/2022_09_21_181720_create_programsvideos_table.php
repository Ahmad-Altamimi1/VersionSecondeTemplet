<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programsvideos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('LASTDATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->unsignedBigInteger('REED');
            $table->Integer('PROGRAM')->nullable();
            $table->Integer('NO')->nullable();
            $table->longText('TITLE')->nullable();
            $table->longText('DESCRIPTION')->nullable();
            $table->string('IMG')->nullable();
            $table->string('VID')->nullable();
            $table->longText('TEXT')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programsvideos');
    }
}
