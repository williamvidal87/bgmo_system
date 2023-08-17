<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('work_description');
            $table->string('location')->nullable();
            $table->dateTime('schedule')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->dateTime('set_schedule')->nullable();
            
            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('statuses');
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
        Schema::dropIfExists('request_services');
    }
}
