<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->longText('TITLE');
            $table->longText('DESCRIPTION');
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('LASTDATE')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->string('IMG')->nullable();
            $table->string('COLOR')->nullable();;
            $table->longText('TEXT')->nullable();
            $table->integer('NO')->nullable();
            $table->string('PERSON')->nullable();
            $table->unsignedBigInteger('REED')->nullable();
            $table->string('FACEBOOK')->nullable();
            $table->string('YOUTUBE')->nullable();
            $table->string('TWITTER')->nullable();
            $table->string('INSTAGRAM')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
