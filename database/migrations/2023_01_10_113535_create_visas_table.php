<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('arrival_date')->nullable();
            $table->string('visa_duration')->nullable();
            $table->boolean('visa_status')->comment('1:Multiple , 2:Single')->nullable();
            $table->string('passport_picture')->nullable();
            $table->string('personal_picture')->nullable();
            $table->boolean('confirmed')->default('1')->comment('1:Not_confirmed , 2:Confirmed');
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
        Schema::dropIfExists('visas');
    }
}
