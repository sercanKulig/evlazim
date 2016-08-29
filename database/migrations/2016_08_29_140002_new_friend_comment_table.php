<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewFriendCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_friend_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user');
            $table->integer('post_id');
            $table->text('yorum');
            $table->integer('block');
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
        Schema::drop('new_friend_comments');
    }
}
