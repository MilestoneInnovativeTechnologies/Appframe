<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource')->index();
            $table->string('name', 64)->index();
            $table->string('description', 1024)->nullable();
            $table->string('title', 128)->nullable();
            $table->enum('type', ['primary','secondary','success','danger','warning','info','light','dark','link','outline-primary','outline-secondary','outline-success','outline-danger','outline-warning','outline-info','outline-light','outline-dark'])->default('outline-info');
            $table->string('menu', 128)->nullable();
            $table->string('icon', 128)->nullable();
            $table->enum('set', ['far','fas','fab'])->default('far');
            $table->string('on', 256)->nullable();
            $table->string('confirm', 256)->nullable();
            $table->string('handler', 128)->nullable();
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
        Schema::dropIfExists('__resource_actions');
    }
}
