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
               $table->bigInteger('numberId');
               $table->string('email')->nuallable();
               $table->bigInteger('mobile')->nuallable();
               $table->string('group');
               $table->string('class')->nullable();
               $table->string('school')->nullable();
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