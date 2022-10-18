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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->unsignedBigInteger('subject_id');
            $table->string('avatar');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('price_sale');
            $table->unsignedBigInteger('into_price');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('status');
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
        Schema::dropIfExists('packages');
    }
};
