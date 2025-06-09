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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customerid');
            $table->string('customername');

            $table->string('landmark');

            $table->unsignedBigInteger('locationid')->nullable();
            $table->index('locationid');
            $table->foreign('locationid')
                ->references('locationid')
                ->on('locations')
                ->onDelete('cascade');
            $table->string('pincode');
            $table->string('phone');
            $table->string('email');
            $table->string('regdate');
            $table->string('username');
            $table->string('password');







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
        Schema::dropIfExists('customers');
    }
};
