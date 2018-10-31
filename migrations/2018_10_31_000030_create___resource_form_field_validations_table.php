<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormFieldValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_field_validations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_field')->index();
            $table->string('rule', 512)->nullable();
            $table->string('message', 1024)->nullable();
            $table->string('arg1', 64)->nullable();
            $table->string('arg2', 64)->nullable();
            $table->string('arg3', 64)->nullable();
            $table->string('arg4', 64)->nullable();
            $table->string('arg5', 64)->nullable();
            $table->timestamps();
            $table->foreign('form_field')->references('id')->on('__resource_form_fields')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_form_field_validations');
    }
}
