<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSocialBtnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_btns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('line')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('discord')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('youtube')->nullable();
            $table->text('wechat')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('other')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_social_btns');
    }
}
