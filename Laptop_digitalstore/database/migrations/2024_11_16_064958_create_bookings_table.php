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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('bookingid');
            $table->unsignedBigInteger('laptopid')->nullable();
            $table->index('laptopid');
            $table->foreign('laptopid')
                ->references('laptopid')
                ->on('laptops')
                ->onDelete('cascade');
            $table->unsignedBigInteger('customerid')->nullable();
            $table->index('customerid');
            $table->foreign('customerid')
                ->references('customerid')
                ->on('customers')
                ->onDelete('cascade');
            $table->date('bookingdate');

            $table->string('quantity');
            $table->string('totalamount');
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
};
