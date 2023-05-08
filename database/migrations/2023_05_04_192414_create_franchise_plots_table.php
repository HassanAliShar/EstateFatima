<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchisePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_plots', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->foreignId('block_id');
            $table->foreignId('block_type_id');
            $table->string('size');
            $table->decimal('total_price', 10, 2);
            $table->decimal('down_payment', 10, 2);
            $table->decimal('ins_payment', 10, 2);
            $table->string('status')->nullable();
            $table->string('confirm_staus')->nullable();
            $table->foreignId('user_id');

            $table->foreign('block_id')->references('id')->on('blocks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('block_type_id')->references('id')->on('block_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('franchise_plots');
    }
}
