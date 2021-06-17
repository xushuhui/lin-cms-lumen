<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lin_file', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("type")->comment("1 local，其他表示其他地方");
            $table->string("path",255)->comment("路径");
            $table->string("name",100)->comment("名称");
            $table->string("extension",20)->comment("后缀");
            $table->integer("size")->comment("大小");
            $table->string("md5",255)->comment("图片md5");
            $table->softDeletes();
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
        Schema::dropIfExists('lin_file');
    }
}
