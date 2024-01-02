<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_masters', function (Blueprint $table) {
            $table->id();
            $table->string('grade_name');
            $table->string('grade_material_type')->nullable();
            $table->string('grade_quality_code')->nullable();
            $table->enum('grade_status', ['Active', 'Inactive'])->default('Active');

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
        Schema::dropIfExists('grade_masters');
    }
}
