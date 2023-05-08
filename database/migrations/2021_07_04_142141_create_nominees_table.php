<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile_no');
            $table->string('cnic_no');
            $table->string('phone')->nullable();
            $table->string('perment_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('passport')->nullable();
            $table->string('images')->nullable();
            $table->string('gender')->nullable();
            $table->string('guardian')->nullable();
            $table->string('relation')->nullable();
            $table->foreignId('customer_id');

            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('nominees');
    }
}
