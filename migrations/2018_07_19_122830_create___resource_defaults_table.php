<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_defaults', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource')->index();
            $table->unsignedInteger('list')->index()->nullable();
            $table->unsignedInteger('create')->index()->nullable();
            $table->unsignedInteger('read')->index()->nullable();
            $table->unsignedInteger('update')->index()->nullable();
            $table->timestamps();
            $table->foreign('resource')->references('id')->on('__resources')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('list')->references('id')->on('__resource_lists')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('create')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('read')->references('id')->on('__resource_data')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('update')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_defaults');
    }
}
