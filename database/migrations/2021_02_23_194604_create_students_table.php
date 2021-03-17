<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
              $table->string('name');
             $table->decimal('numberId',8,5);
             $table->string('email')->nuallable();
             $table->bigInteger('mobile')->nuallable();
            //  $table->integer('password')->nullable();
            //   $table->string('sname')->nullable();
            //   $table->string('tname')->nullable();
            //   $table->string('lname')->nullable();
              $table->string('class')->nullable();
            //   $table->string('status')->nullable();
               $table->string('school')->nullable();
            //   $table->integer('year')->nullable();
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
        Schema::dropIfExists('students');
    }
}
