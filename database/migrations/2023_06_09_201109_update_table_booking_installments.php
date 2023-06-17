<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableBookingInstallments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_installments', function (Blueprint $table) {
            $table->decimal('agent_commsion',20,2)->nullable();
            $table->decimal('sub_agent_comission',20,2)->nullable();
            $table->foreignId('sub_agent_id')->nullable();
            $table->foreign('sub_agent_id')->references('id')->on('sub_agents')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('booking_installments', function (Blueprint $table) {
        //     $table->dropColumn('new_column');
        // });
    }
}
