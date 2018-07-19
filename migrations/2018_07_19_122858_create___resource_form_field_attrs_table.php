<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormFieldAttrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_field_attrs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_field');
            $table->string('name', 64)->nullable();
            $table->string('value', 128)->nullable();
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
        Schema::dropIfExists('__resource_form_field_attrs');
    }
}
