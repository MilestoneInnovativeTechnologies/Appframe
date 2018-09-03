<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__organisation_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organisation');
            $table->enum('type', ['number','email','address'])->default('number');
            $table->string('type_name', 64)->nullable();
            $table->string('detail', 256)->nullable();
            $table->timestamps();
            $table->foreign('organisation')->references('id')->on('__organisation')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__organisation_contacts');
    }
}
