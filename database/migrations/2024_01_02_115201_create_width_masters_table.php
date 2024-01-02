<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidthMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('width_masters', function (Blueprint $table) {
            $table->id();
            $table->decimal('width', $precision = 8, $scale = 2);
            $table->string('width_cat')->nullable();
            $table->enum('width_status', ['Active', 'Inactive'])->default('Active');

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
        Schema::dropIfExists('width_masters');
    }
}
