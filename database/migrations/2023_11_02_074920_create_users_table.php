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
            // $table->id();
            // $table->timestamps();

            $table->id();
            $table->string('login_id');
            $table->string('email_id');
            $table->string('mobile_no');
            $table->string('password');
            $table->string('full_name');
            $table->unsignedBigInteger('role_id');
            $table->enum('user_status', ['Active', 'Suspended', 'Banned'])->default('Active');
            $table->dateTime('registration_date');
            $table->dateTime('last_login_date_time');
            $table->string('password_reset_code')->nullable();
            $table->string('creator_id')->default('Admin');
            $table->dateTime('create_date_time');
            $table->string('modifier_id')->default('Admin');
            $table->dateTime('modify_date_time');
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTIme('deleted_at')->nullable();
            
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
