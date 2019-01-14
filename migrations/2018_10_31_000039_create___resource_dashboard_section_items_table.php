<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDashboardSectionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_dashboard_section_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('section')->index();
            $table->unsignedTinyInteger('size')->default(12);
            $table->string('title', 128)->nullable();
            $table->enum('item', ['Metric','List','ListRelation'])->default('Metric');
            $table->string('item_id', 64)->nullable();
            $table->string('item_id2', 64)->nullable();
            $table->audit();
            $table->foreign('section')->references('id')->on('__resource_dashboard_sections')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_dashboard_section_items');
    }
}
