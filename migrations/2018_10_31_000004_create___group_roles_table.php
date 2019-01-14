<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__group_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('group');
            $table->unsignedInteger('role');
            $table->audit();
            $table->foreign('group')->references('id')->on('__groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role')->references('id')->on('__roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__group_roles');
    }
}
