<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoryComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->integer('user_id');
            $table->integer('parent')->nullable();
            $table->text('content');
            $table->boolean('deleted')->default(False);
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
        Schema::dropIfExists('story_comments');
    }
}
