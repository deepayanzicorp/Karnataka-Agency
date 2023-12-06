<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_name');
            $table->string('buyer_short_name')->nullable();
            $table->enum('buyer_status', ['Active', 'Inactive'])->default('Active');
            $table->string('buyer_address1')->nullable();
            $table->string('buyer_address2')->nullable();
            $table->string('buyer_state')->nullable();
            $table->string('buyer_country')->default('India');
            $table->integer('buyer_pincode')->length(6)->nullable();
            $table->string('buyer_gstin_no')->nullable();
            $table->enum('buyer_gstin', ['Yes', 'No'])->default('Yes');

            $table->string('buyer_contact_person_name')->nullable();
            $table->string('buyer_contact_person_email')->nullable();
            $table->string('buyer_contact_person_mobile')->length(10)->nullable();

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
        Schema::dropIfExists('buyer_contact_details');
    }
}
