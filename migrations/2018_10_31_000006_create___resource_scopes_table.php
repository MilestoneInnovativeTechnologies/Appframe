<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_scopes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource')->index();
            $table->string('name', 64)->index();
            $table->string('description', 1024)->nullable();
            $table->string('method', 128)->nullable();
            $table->string('arg1', 64)->nullable();
            $table->string('arg2', 64)->nullable();
            $table->string('arg3', 64)->nullable();
            $table->audit();
            $table->foreign('resource')->references('id')->on('__resources')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_scopes');
    }
}
