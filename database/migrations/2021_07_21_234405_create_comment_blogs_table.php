<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('user_id');
            $table->string('content');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_blogs');
    }
}
