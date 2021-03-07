<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('task_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('duration');
            $table->string('status', 10);
            $table->longText('notes');
            $table->foreign('project_id')->references('id')->on('projects')->onCascade('delete');
            $table->foreign('task_id')->references('id')->on('tasks')->onCascade('delete');
            $table->foreign('user_id')->references('id')->on('users')->onCascade('delete');
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
        Schema::dropIfExists('entries');
    }
}
