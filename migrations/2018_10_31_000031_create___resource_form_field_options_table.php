<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormFieldOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_field_options', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_field')->index();
            $table->enum('type', ['List','Enum','Foreign','Method'])->default('List');
            $table->text('detail', 128)->nullable();
            $table->string('value_attr', 64)->nullable();
            $table->string('label_attr', 128)->nullable();
            $table->enum('preload', ['Yes','No'])->default('Yes');
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
        Schema::dropIfExists('__resource_form_field_options');
    }
}
