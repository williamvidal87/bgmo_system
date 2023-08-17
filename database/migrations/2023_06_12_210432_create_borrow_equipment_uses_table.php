<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowEquipmentUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_equipment_uses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('used_id');
            $table->unsignedBigInteger('device_id');
            $table->bigInteger('qty')->nullable();
            
            $table->foreign('used_id')->references('id')->on('equipment_borrowings');
            $table->foreign('device_id')->references('id')->on('inventories');
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
        Schema::dropIfExists('borrow_equipment_uses');
    }
}
