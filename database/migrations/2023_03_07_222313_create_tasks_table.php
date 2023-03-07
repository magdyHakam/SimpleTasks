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
            $table->id(); // bigIncrements
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('assigned_to_id');
            $table->foreign('assigned_to_id')->references('id')->on('users');
            $table->unsignedBigInteger('assigned_by_id');
            $table->foreign('assigned_by_id')->references('id')->on('users');
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
