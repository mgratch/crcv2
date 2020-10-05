<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('traffic_id');
            $table->string('extension');
            $table->string('format');
            $table->string('file');
            $table->string('name');
            $table->string('size');
            $table->string('size2');
            $table->string('title');
            $table->string('type');
            $table->string('url');
            $table->timestamps();

            $table->index('traffic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
