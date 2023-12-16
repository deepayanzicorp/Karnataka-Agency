<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('seller_name');
            $table->string('seller_short_name')->nullable();
            $table->enum('seller_status', ['Active', 'Inactive'])->default('Active');
            $table->string('seller_address1')->nullable();
            $table->string('seller_address2')->nullable();
            $table->string('seller_state')->nullable();
            $table->string('seller_country')->default('India');
            $table->integer('seller_pincode')->length(6)->nullable();
            $table->string('seller_gstin_no')->nullable();
            $table->enum('seller_gstin', ['Yes', 'No'])->default('Yes');

            $table->string('seller_contact_person_name')->nullable();
            $table->string('seller_contact_person_email')->nullable();
            $table->string('seller_contact_person_mobile')->length(10)->nullable();

            $table->string('creator_id')->default('Admin');
            $table->dateTime('create_date_time');
            $table->string('modifier_id')->default('Admin');
            $table->dateTime('modify_date_time');

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_contact_details');
    }
}
