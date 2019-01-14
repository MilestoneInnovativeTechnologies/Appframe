<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataScopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_data_scopes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_data')->index();
            $table->unsignedInteger('scope')->index();
            $table->audit();
            $table->foreign('resource_data')->references('id')->on('__resource_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('scope')->references('id')->on('__resource_scopes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_data_scopes');
    }
}
