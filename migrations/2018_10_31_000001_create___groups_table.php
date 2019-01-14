<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->index();
            $table->string('description', 1024)->nullable();
            $table->string('title', 128)->nullable();
            $table->audit();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__groups');
    }
}
