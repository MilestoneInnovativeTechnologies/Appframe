<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__organisation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 512)->index();
            $table->string('name_short', 128)->nullable();
            $table->string('name_long', 512)->nullable();
            $table->string('address_line1', 1024)->nullable();
            $table->string('address_line2', 1024)->nullable();
            $table->string('address_short', 512)->nullable();
            $table->string('address_long', 1024)->nullable();
            $table->audit();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__organisation');
    }
}
