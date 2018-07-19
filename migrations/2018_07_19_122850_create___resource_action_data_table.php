<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceActionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_action_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_action')->index();
            $table->unsignedInteger('resource_data')->index();
            $table->timestamps();
            $table->foreign('resource_action')->references('id')->on('__resource_actions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('resource_data')->references('id')->on('__resource_data')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_action_data');
    }
}
