<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('equipment_name')->nullable();
            $table->text('property_no')->nullable();
            $table->text('serial_no')->nullable();
            $table->text('specs')->nullable();
            $table->dateTime('acquisition_date')->nullable();
            $table->unsignedBigInteger('status_id');
            
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
        Schema::dropIfExists('inventories');
    }
}
