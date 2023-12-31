<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Assuming each vote is associated with a user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('hour');
            $table->integer('males');
            $table->integer('females');
            $table->integer('old_people');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
