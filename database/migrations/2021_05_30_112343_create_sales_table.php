<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->bigInteger('buyer_id');
            $table->boolean('delivered')->default(false);
            $table->boolean('paid')->default(false);
            $table->boolean('is_enable');
            $table->string('delivered_at')->nullable();
            $table->string('paid_at')->nullable();
            $table->bigInteger('promotion_id')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
