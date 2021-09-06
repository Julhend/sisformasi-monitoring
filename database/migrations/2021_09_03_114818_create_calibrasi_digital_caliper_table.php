<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalibrasiDigitalCaliperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibrasi_digital_caliper', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->string('tool_name');
            $table->string('serial_number');
            $table->string('measuring_range');
            $table->string('report_no');
            $table->date('date_cal');
            $table->date('next_cal');
            $table->string('ambient_temp')->default('20 ± 1° C');
            $table->string('relative_humidity')->default('55 ± 10% r.h');
            $table->string('measured_value1');
            $table->string('measured_value2');
            $table->string('measured_value3');
            $table->string('measured_value4');
            $table->string('measured_value5');
            $table->string('measured_value6');
            $table->string('measured_value7');
            $table->string('measured_value8');
            $table->string('measured_value9');
            $table->string('measured_value10');
            $table->string('measured_value11');
            $table->string('measured_value12');
            $table->string('error1');
            $table->string('error2');
            $table->string('error3');
            $table->string('error4');
            $table->string('error5');
            $table->string('error6');
            $table->string('error7');
            $table->string('error8');
            $table->string('error9');
            $table->string('error10');
            $table->string('error11');
            $table->string('error12');
            $table->string('checked_by')->nullable();
            $table->string('approved_by')->default("not yet approved");
            $table->string('disposition')->default('pending');
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
        Schema::dropIfExists('calibrasi_digital_caliper');
    }
}
