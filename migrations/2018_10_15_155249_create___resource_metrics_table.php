<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resource')->index();
            $table->string('name', 64)->index();
            $table->unsignedInteger('resource_list')->index();
            $table->enum('aggregates', ['COUNT','SUM','AVG','MAX','MIN'])->default('COUNT');
            $table->string('aggregate_field', 64)->nullable();
            $table->enum('aggregate_distinct', ['No','Yes'])->default('No');
            $table->enum('date_field', ['created_at','updated_at'])->default('created_at');
            $table->enum('range_unit', ['DAY','WEEK','MONTH','YEAR','MINUTE','HOUR','WTD','WTD2','MTD','QTD','HTD','YTD'])->default('DAY');
            $table->unsignedTinyInteger('range')->default(2);
            $table->string('groupby', 64)->nullable();
            $table->string('method', 128)->nullable();
            $table->timestamps();
            $table->foreign('resource')->references('id')->on('__resources')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('resource_list')->references('id')->on('__resource_lists')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_metrics');
    }
}
