<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
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
            $table->id();
            $table->string('nickname', 24);
            $table->string('username', 24);
            $table->string('password', 60);
            $table->tinyInteger('super')->default(1)->comment("是否为超级管理员 ; 1 -> 普通用户 | 2 -> 超级管理员");
            $table->tinyInteger('active')->default(1);
            $table->integer('group_id');
            $table->string('email', 100);
            $table->string('avatar', 100);
            $table->timestamps();
            $table->softDeletes();
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
