<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapmodels', function (Blueprint $table) {
            $table->bigIncrements('modelid');
            $table->string('modelname');
            $table->unsignedBigInteger('brandid')->nullable();
            $table->index('brandid');
            $table->foreign('brandid')
            ->references('brandid')
            ->on('brands')
            ->onDelete('cascade');
            //
        
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
        Schema::dropIfExists('lapmodels');
    }
};
