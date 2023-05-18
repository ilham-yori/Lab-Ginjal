<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detection_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laborant_id');
            $table->unsignedBigInteger('patient_id');
            $table->text('image');
            $table->string('prediction')->nullable();
            $table->dateTime('date_detection');
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->String('validation_detection')->nullable();
            $table->dateTime('validation_date_detection')->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('laborant_id')->references('id')->on('hospital_employees');
            $table->foreign('doctor_id')->references('id')->on('hospital_employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detection_history');
    }
};
