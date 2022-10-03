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
        Schema::create('attendance_symptom', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_id')->references('id')->on('attendances');
            $table->foreignId('symptom_id')->references('id')->on('symptoms');
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
        Schema::dropIfExists('attendance_symptom');
    }
};
