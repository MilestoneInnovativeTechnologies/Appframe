<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormFieldDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_field_dynamic', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_field')->index();
            $table->enum('type', ['disabled-enabled','enabled-disabled','hidden-visible','visible-hidden','readonly-editable','editable-readonly'])->default('disabled-enabled');
            $table->string('depend_field', 64)->index()->nullable();
            $table->enum('alter_on', ['not null','value','null'])->default('not null');
            $table->string('value', 128)->nullable();
            $table->string('values', 1024)->nullable();
            $table->enum('operator', ['=','<','>','<=','>=','<>','In','NotIn','like'])->default('=');
            $table->enum('on_multiple', ['and','or'])->default('and');
            $table->audit();
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
        Schema::dropIfExists('__resource_form_field_dynamic');
    }
}
