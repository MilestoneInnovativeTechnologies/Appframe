<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_layout', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_form')->index();
            $table->unsignedInteger('form_field')->index();
            $table->unsignedTinyInteger('colspan')->default(12);
            $table->timestamps();
            $table->foreign('resource_form')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('__resource_form_layout');
    }
}
