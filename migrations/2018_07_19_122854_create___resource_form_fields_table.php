<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_form');
            $table->string('name', 64)->index();
            $table->string('type', 128)->nullable();
            $table->string('label', 256)->nullable();
            $table->string('collection', 64)->nullable();
            $table->timestamps();
            $table->foreign('resource_form')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_form_fields');
    }
}
