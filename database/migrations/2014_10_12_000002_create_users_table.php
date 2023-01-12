<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            # Register
            $table->string('email')->nullable()->unique();

            ## Mobile number verification
            $table->string('country_code')->nullable();
            $table->string('mobile_number')->nullable()->unique();
            $table->string('OTP_CODE', 4)->nullable();

            ## Passport Data
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->boolean('gender')->comment('1:Female, 2:Male')->nullable();
            $table->string('country_of_residency')->nullable();
            $table->string('passport_no')->nullable();
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('place_of_issue')->nullable();
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->boolean('user_type')->comment('1:guest, 2:companion')->nullable();
            $table->boolean('has_companion')->comment('1:Yes, 2:No')->nullable();
            $table->timestamp('email_verified_at')->nullable()->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
