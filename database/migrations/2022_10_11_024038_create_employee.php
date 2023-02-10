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
//         Schema::create('employee', function (Blueprint $table) {
//             $table->increments('id_employee');
//             $table->string('ma_employee');
//             $table->string('full_name');
//             $table->date('date_of_birth');
//             $table->tinyInteger('gender');
//             $table->string('avatar');
//             $table->string('email');
//             $table->string('phone');
//             $table->string('ethnic');
//             $table->string('religion');
//             $table->string('nationality');
//             $table->string('cmnd');
//             $table->string('issued_by');
//             $table->date('date_range');
//             $table->string('a_relative');
//             $table->string('phone_a_relative');
//             $table->string('contract_code');
//             $table->foreign('contract_code');
//             $table->date('contract_signing_date');
//             $table->date('effective_date');
//             $table->date('expiration_date');
//             $table->string('type_of_contract');
//             $table->string('office');
//             $table->string('headquarters');
//             $table->string('rank');
//             $table->double('wage');
//             $table->string('payments');
//             $table->double('insurance_money');
//             $table->string('BHYT');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('employee');
//     }
// };
