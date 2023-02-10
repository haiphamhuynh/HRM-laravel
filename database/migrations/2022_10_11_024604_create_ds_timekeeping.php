<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('ds_timekeeping', function (Blueprint $table) {
//             $table->increments('id_timekeeping');
//             $table->unsignedInteger('id_timesheets');
//             $table->foreign('id_timesheets')
//                     ->references('id_timesheets')
//                     ->on('timesheets')
//                     ->onDelete('cascade');
//             $table->unsignedInteger('id_employee');
//             $table->foreign('id_employee')
//                     ->references('id_employee')
//                     ->on('employee')
//                     ->onDelete('cascade');
//             $table->date('start_day');
//             $table->date('end_day');
//             $table->double('total_salary');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('ds_timekeeping');
//     }
// };
