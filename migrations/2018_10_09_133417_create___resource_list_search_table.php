<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceListSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_list_search', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_list')->index();
            $table->string('field', 64)->nullable();
            $table->unsignedInteger('relation')->index()->nullable();
            $table->unsignedInteger('nest_relation1')->index()->nullable();
            $table->unsignedInteger('nest_relation2')->index()->nullable();
            $table->unsignedInteger('nest_relation3')->index()->nullable();
            $table->timestamps();
            $table->foreign('resource_list')->references('id')->on('__resource_lists')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relation')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation1')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation2')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('nest_relation3')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_list_search');
    }
}
