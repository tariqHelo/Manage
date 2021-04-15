<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_details', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->foreignId("student_id")->nullable();
            $table->foreign('student_id')->references('id')->on("students")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
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
        Schema::dropIfExists('image_details');
    }
}
