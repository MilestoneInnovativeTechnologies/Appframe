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
            $table->string('name', 64)->index();
            $table->string('value', 1024)->nullable();
            $table->string('method', 128)->nullable();
            $table->unsignedInteger('relation')->index();
            $table->unsignedInteger('deep1')->index()->nullable();
            $table->unsignedInteger('deep2')->index()->nullable();
            $table->unsignedInteger('deep3')->index()->nullable();
            $table->string('attribute', 64)->nullable();
            $table->timestamps();
            $table->foreign('relation')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deep1')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('deep2')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('deep3')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
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
