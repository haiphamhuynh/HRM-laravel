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
//         Schema::create('timesheets', function (Blueprint $table) {
//             $table->increments('id_timesheets');
//             $table->unsignedInteger('id_employee');
//             $table->foreign('id_employee')
//                     ->references('id_employee')
//                     ->on('employee')
//                     ->onDelete('cascade');
//             $table->date('start_time');
//             $table->date('end_time');
//             $table->double('total_working_time');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('timesheets');
//     }
// };
