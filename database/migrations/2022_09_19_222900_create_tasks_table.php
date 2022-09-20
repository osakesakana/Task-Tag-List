<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');    // contentカラム
            $table->string('priority');    // priorityカラム
            $table->string('progress');    // progressカラム

            $table->unsignedBigInteger('user_id');
            // // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            
            // $table->unsignedBigInteger('tag_id');
            // // // 外部キー制約
            // $table->foreign('tag_id')->references('id')->on('tags');
            
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
        Schema::dropIfExists('tasks');
    }
}
