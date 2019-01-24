<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->index();
            $table->string('description', 1024)->nullable();
            $table->string('title', 128)->nullable();
            $table->string('namespace', 512)->nullable()->default('Milestone\Appframe');
            $table->string('table', 64)->nullable();
            $table->string('controller', 128)->nullable();
            $table->string('controller_namespace', 512)->nullable();
            $table->enum('development', ['No','Yes'])->default('No');
            $table->audit();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resources');
    }
}
