<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource')->index();
            $table->string('name', 64)->index();
            $table->string('description', 1024)->nullable();
            $table->string('title_field', 128)->nullable();
            $table->string('method', 128)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('__resource_data');
    }
}
