<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterlist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->string('equipment_description');
            $table->string('range');
            $table->string('equip_control_no');
            $table->string('inspection_method');
            $table->string('acceptance_kriteria');
            $table->string('frequency');
            $table->date('date_cal');
            $table->date('next_cal');
            $table->string('dept');
            $table->string('instrument_serial_number');
            $table->string('remark');
            $table->string('status');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masterlist');
    }
}
