<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource')->index();
            $table->string('name', 64)->index();
            $table->string('description', 1024)->nullable();
            $table->string('method', 128)->nullable();
            $table->enum('type', ['hasOne','hasMany','belongsTo','belongsToMany'])->default('hasMany');
            $table->unsignedInteger('relate_resource')->index()->nullable();
            $table->audit();
            $table->foreign('resource')->references('id')->on('__resources')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relate_resource')->references('id')->on('__resources')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_relations');
    }
}
