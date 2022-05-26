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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->string('name');
            $table->double('price');
            $table->double('price_sale');
            $table->text('description');
            $table->date('exp_date');
            $table->text('img_url');
            $table->date('deleted_at');
            $table->integer('quantity')->default(1);
            $table->integer('min_quantity');
            $table->foreignId('category_id')->unsigned()->constrained('categories')->cascadeOnDelete();
            $table->index('user_id');
            $table->foreignId('user_id')->unsigned()->unique()->constrained('users')->cascadeOnDelete();
            $table->foreignId('storage_id')->unsigned()->constrained('storages')->cascadeOnDelete();
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
};
