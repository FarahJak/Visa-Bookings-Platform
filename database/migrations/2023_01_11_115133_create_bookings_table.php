<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->boolean('room_type')->comment('1:King_bed , 2:Twin_bed')->nullable();
            $table->boolean('has_extra_night')->comment('1:yes , 2:No')->nullable();
            $table->date('check_in_date_2')->nullable();
            $table->date('check_out_date_2')->nullable();
            $table->boolean('room_type_2')->comment('1:King_bed , 2:Twin_bed')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
