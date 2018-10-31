<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataViewSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_data_view_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_data')->index();
            $table->string('title', 128)->nullable();
            $table->string('title_field', 128)->nullable();
            $table->unsignedInteger('relation')->index()->nullable();
            $table->unsignedTinyInteger('colspan')->default(12);
            $table->timestamps();
            $table->foreign('resource_data')->references('id')->on('__resource_data')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('__resource_data_view_sections');
    }
}
