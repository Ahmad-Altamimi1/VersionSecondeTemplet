<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tagId');
            $table->unsignedBigInteger('groupId');
            // $table->foreign('groupId')->references('id')->on('groups')->onDelete('set null');
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
        Schema::dropIfExists('groups_tags');
    }
}
