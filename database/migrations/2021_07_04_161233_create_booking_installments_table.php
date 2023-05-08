<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_installments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('booking_order_id');
            $table->foreignId('booking_id');
            $table->foreignId('customer_id');
            $table->decimal('installment_amount', 10, 2);
            $table->text('installment_details')->nullable();

            $table->foreign('booking_order_id')->references('id')->on('booking_orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('booking_id')->references('id')->on('bookings')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('booking_installments');
    }
}
