<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrafficTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('salesman');
            $table->string('branch');
            $table->string('rerent');
            $table->string('io');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('sn')->nullable();
            $table->string('hours')->nullable();
            $table->string('fuel')->nullable();
            $table->text('attachments')->nullable();
            $table->string('damages');
            $table->string('customer')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traffic');
    }
}
