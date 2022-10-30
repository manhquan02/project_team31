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
        Schema::create('schedule_pt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pt_id');
            $table->unsignedBigInteger('contract_id');
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('weekday_id');
            $table->date('date');
            $table->unsignedBigInteger('status');
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
        Schema::dropIfExists('schedule_pt');
    }
};
