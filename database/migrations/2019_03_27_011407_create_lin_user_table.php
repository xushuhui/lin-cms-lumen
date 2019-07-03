<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 24);
            $table->string('password', 60);
            $table->smallInteger('super');
            $table->smallInteger('active');
            $table->integer('group_id');
            $table->string('email', 100);
            $table->string('avatar', 100);
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->integer('deleted_at');
            //$table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lin_user');
    }
}
