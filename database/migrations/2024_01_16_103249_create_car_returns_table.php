<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('car_returns', function (Blueprint $table) {
        $table->id();
        $table->string('car_plate');
        $table->date('return_date');
        $table->integer('rent_days');
        $table->decimal('rental_fee', 8, 2);
        $table->timestamps();
    });
    }

    public function down()
    {
        Schema::dropIfExists('car_returns');
    }
};
