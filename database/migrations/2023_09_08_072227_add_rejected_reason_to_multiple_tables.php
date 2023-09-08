<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRejectedReasonToMultipleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calibrasi_digital_caliper', function (Blueprint $table) {
            $table->string('rejected_reason')->nullable();
        });
    
        Schema::table('calibrasi_thread_gauge', function (Blueprint $table) {
            $table->string('rejected_reason')->nullable();
        });
    
        Schema::table('calibrasi_outside_dial_micrometer', function (Blueprint $table) {
            $table->string('rejected_reason')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('multiple_tables', function (Blueprint $table) {
            //
        });
    }
}
