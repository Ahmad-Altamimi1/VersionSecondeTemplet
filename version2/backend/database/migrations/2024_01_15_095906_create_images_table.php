<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->timestamp('DATE')->useCurrent();
            $table->timestamp('Update_date')->nullable()->useCurrentOnUpdate();
            $table->unsignedBigInteger('WRITER');
            $table->unsignedBigInteger('EDITOR');
            $table->string('groupId')->nullable();
            $table->string('tagId')->nullable();
            $table->string('IMG')->nullable();
            $table->timestamp('DATE_SCHEDULER')->nullable();;
            $table->tinyInteger('DRAFT')->default('0');
            $table->tinyInteger('URGENT')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
