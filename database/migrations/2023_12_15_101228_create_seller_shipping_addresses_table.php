<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_short_name');
            $table->unsignedBigInteger('seller_id');
            $table->string('shipping_zone')->nullable();
            $table->string('shipping_short_code')->nullable();
            $table->string('shipping_party_code')->nullable();
            $table->enum('shipping_status', ['Active', 'Inactive'])->default('Active');
            $table->string('shipping_destination')->nullable();
            $table->string('shipping_place')->nullable();
            $table->string('shipping_address1')->nullable();
            $table->string('shipping_address2')->nullable();
            $table->string('shipping_state')->nullable();

            $table->string('shipping_contact_person_name')->nullable();
            $table->string('shipping_contact_person_email')->nullable();
            $table->string('shipping_contact_person_mobile')->length(10)->nullable();

            $table->string('creator_id')->default('Admin');
            $table->dateTime('create_date_time');
            $table->string('modifier_id')->default('Admin');
            $table->dateTime('modify_date_time');

            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('seller_id')->references('id')->on('seller_contact_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_shipping_addresses');
    }
}
