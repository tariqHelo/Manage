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
              $table->string('fname');
             $table->string('sname');
             $table->string('tname');
             $table->string('lname');
             $table->string('class');
             $table->string('status')->nullable();
             $table->string('school')->nullable();
             $table->integer('year')->nullable();
             $table->integer('number')->nullable();
             $table->string('email');
             $table->bigInteger('mobile')->nullable();
             $table->integer('password')->nullable();
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
