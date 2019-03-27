<?php

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
            $table->string('password', 32);
            $table->smallInteger('super', 6);
            $table->smallInteger('active', 6);
            $table->integer('group_id', 11);
            $table->string('email', 100);
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
