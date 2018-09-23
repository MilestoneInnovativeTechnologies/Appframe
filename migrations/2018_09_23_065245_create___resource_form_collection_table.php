<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_collection', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_form')->index();
            $table->unsignedInteger('collection_form')->index();
            $table->unsignedInteger('relation')->index()->nullable();
            $table->timestamps();
            $table->foreign('resource_form')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('collection_form')->references('id')->on('__resource_forms')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('__resource_form_collection');
    }
}
