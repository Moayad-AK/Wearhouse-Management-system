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
        Schema::create('product_in_storages', function (Blueprint $table) {
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('supplier_id');
            $table->double('price_in');
            $table->double('price_out');
            $table->double('quantity');
            $table->timestamps();

            $table->primary(['storage_id', 'product_id']);

            $table->foreign('storage_id')->references('id')->on('storages');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_in_storages');
    }
};
