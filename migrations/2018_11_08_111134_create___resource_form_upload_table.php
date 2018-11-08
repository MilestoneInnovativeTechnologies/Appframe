<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceFormUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__resource_form_upload', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code', 15)->nullable();
            $table->string('name', 256)->nullable();
            $table->string('name_client', 1024)->nullable();
            $table->string('mime', 64)->nullable();
            $table->string('mime_client', 256)->nullable();
            $table->unsignedInteger('size')->default(1);
            $table->string('disk', 64)->nullable();
            $table->string('path', 512)->nullable();
            $table->string('file', 2048)->nullable();
            $table->string('extension', 32)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('__resource_form_upload');
    }
}
