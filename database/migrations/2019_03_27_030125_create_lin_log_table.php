<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lin_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message',250);
            $table->integer('user_id', 11);
            $table->string('user_name',20);
            $table->integer('status_code',11);
            $table->string('method',20);
            $table->string('path',50);
            $table->string('authority',100);
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
        Schema::dropIfExists('lin_log');
    }
}
