<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('paymentid');
            $table->unsignedBigInteger('bookingid')->nullable();
            $table->index('bookingid');
            $table->foreign('bookingid')
                ->references('bookingid')
                ->on('bookings')
                ->onDelete('cascade');

            $table->date('paymentdate');
            $table->string('pstatus');
            $table->string('housename');
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
        Schema::dropIfExists('payments');
    }
};
