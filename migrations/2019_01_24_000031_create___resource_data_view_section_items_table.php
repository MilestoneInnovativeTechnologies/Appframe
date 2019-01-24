<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataViewSectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_data_view_section_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section')->index();
            $table->string('label', 128)->nullable();
            $table->string('attribute', 64)->nullable();
            $table->unsignedInteger('relation')->index()->nullable();
            $table->audit();
            $table->foreign('section')->references('id')->on('__resource_data_view_sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relation')->references('id')->on('__resource_relations')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_data_view_section_items');
    }
}
