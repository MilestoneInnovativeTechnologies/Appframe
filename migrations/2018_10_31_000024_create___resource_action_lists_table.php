<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceActionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_action_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_action')->index();
            $table->unsignedInteger('resource_list')->index();
            $table->audit();
            $table->foreign('resource_action')->references('id')->on('__resource_actions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('resource_list')->references('id')->on('__resource_lists')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_action_lists');
    }
}
