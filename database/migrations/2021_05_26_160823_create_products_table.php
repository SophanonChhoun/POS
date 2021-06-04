<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name");
            $table->string("type");
            $table->string("brand");
            $table->string("country");
            $table->integer("quantity")->default(0);
            $table->string("item_class");
            $table->integer("sequence_order");
            $table->string("video_url");
            $table->bigInteger("subcategory_id");
            $table->boolean('is_enable');
            $table->bigInteger('media_id');
            $table->double('price');
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
        Schema::dropIfExists('products');
    }
}
