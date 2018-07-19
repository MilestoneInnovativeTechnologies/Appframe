<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceListRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_list_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_list')->index();
            $table->unsignedInteger('relation')->index();
            $table->unsignedInteger('deep1')->index()->nullable();
            $table->unsignedInteger('deep2')->index()->nullable();
            $table->unsignedInteger('deep3')->index()->nullable();
            $table->unsignedInteger('deep4')->index()->nullable();
            $table->unsignedInteger('deep5')->index()->nullable();
            $table->timestamps();
            $table->foreign('resource_list')->references('id')->on('__resource_lists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relation')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deep1')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('deep2')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('deep3')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('deep4')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('deep5')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_list_relations');
    }
}
