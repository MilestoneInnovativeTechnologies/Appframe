<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDashboardSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_dashboard_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource_dashboard')->index();
            $table->string('name', 64)->index();
            $table->string('title', 128)->nullable();
            $table->unsignedSmallInteger('height')->default(300);
            $table->audit();
            $table->foreign('resource_dashboard')->references('id')->on('__resource_dashboard')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_dashboard_sections');
    }
}
