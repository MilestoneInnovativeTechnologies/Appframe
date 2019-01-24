<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_data_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_data')->index();
            $table->unsignedInteger('relation')->index()->nullable();
            $table->unsignedInteger('nest_relation1')->index()->nullable();
            $table->unsignedInteger('nest_relation2')->index()->nullable();
            $table->unsignedInteger('nest_relation3')->index()->nullable();
            $table->unsignedInteger('nest_relation4')->index()->nullable();
            $table->unsignedInteger('nest_relation5')->index()->nullable();
            $table->audit();
            $table->foreign('resource_data')->references('id')->on('__resource_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relation')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation1')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation2')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation3')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation4')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation5')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_data_relations');
    }
}
