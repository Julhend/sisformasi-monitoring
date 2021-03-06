<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalibrasiThreadGaugeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibrasi_thread_gauge', function (Blueprint $table) {
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
            $table->string('wire_gauge_set_no')->nullable();
            $table->string('traceable_report_no')->nullable();
            $table->string('measured_value1');
            $table->string('measured_value2');
            $table->string('measured_value3');
            $table->string('measured_value4');
            $table->string('deviation1');
            $table->string('deviation2');
            $table->string('deviation3');
            $table->string('deviation4');
            $table->string('calibrated_by')->nullable();
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
        Schema::dropIfExists('calibrasi_thread_gauge');
    }
}
