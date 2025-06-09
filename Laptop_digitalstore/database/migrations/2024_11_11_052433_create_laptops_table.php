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
        Schema::create('laptops', function (Blueprint $table) {

            $table->bigIncrements('laptopid');
            $table->string('laptopname');
            $table->string('image1');
            $table->string('image2');
            $table->string('price');
            $table->string('screensize');
            $table->string('color');
            $table->string('harddisk');
            $table->string('processor');
            $table->string('cpumodel');
            $table->string('ram');
            $table->string('os');
            $table->string('graphics');
            $table->string('stock');
            $table->string('warranty');
            $table->string('features');
            $table->unsignedBigInteger('modelid')->nullable();
            $table->index('modelid');
            $table->foreign('modelid')
                ->references('modelid')
                ->on('lapmodels')
                ->onDelete('cascade');

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
        Schema::dropIfExists('laptops');
    }
};
