<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_form')->index();
            $table->string('name', 64)->index();
            $table->string('value', 1024)->nullable();
            $table->string('method', 128)->nullable();
            $table->unsignedInteger('relation')->index()->nullable();
            $table->unsignedInteger('nest_relation1')->index()->nullable();
            $table->unsignedInteger('nest_relation2')->index()->nullable();
            $table->unsignedInteger('nest_relation3')->index()->nullable();
            $table->string('attribute', 64)->nullable();
            $table->timestamps();
            $table->foreign('resource_form')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('__resource_form_defaults');
    }
}
