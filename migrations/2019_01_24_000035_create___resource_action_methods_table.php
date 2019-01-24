<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceActionMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_action_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_action')->index();
            $table->enum('type', ['Method','Dashboard','Form','List','Data','FormWithData','ListRelation','AddRelation','ManageRelation'])->default('Method');
            $table->string('method', 128)->nullable();
            $table->string('idn1', 64)->nullable();
            $table->string('idn2', 64)->nullable();
            $table->string('idn3', 64)->nullable();
            $table->string('idn4', 64)->nullable();
            $table->string('idn5', 64)->nullable();
            $table->audit();
            $table->foreign('resource_action')->references('id')->on('__resource_actions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_action_methods');
    }
}
