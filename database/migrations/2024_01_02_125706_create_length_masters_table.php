<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLengthMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('length_masters', function (Blueprint $table) {
            $table->id();
            $table->string('length_type');
            $table->string('length_material')->nullable();
            $table->decimal('length_measurement', $precision = 8, $scale = 2)->nullable();
            $table->enum('length_status', ['Active', 'Inactive'])->default('Active');

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
        Schema::dropIfExists('length_masters');
    }
}
