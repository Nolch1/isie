<?php

// database/migrations/xxxx_xx_xx_create_selectedpeople_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedpeopleTable extends Migration
{
    public function up()
    {
        Schema::create('selectedpeople', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('selectedpeople');
    }
}
