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
            $table->id()->autoIncrement();
            $table->String('title',150);
            $table->String('keywords')->nullable();
            $table->String('description')->nullable();
            $table->String('image',75)->nullable();
            $table->integer('category_id')->nullable();
            $table->String('details')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('user_id')->nullable();
            $table->String('status',5)->nullable()->default('False');
            $table->integer('tax')->default(18);
            $table->String('slug')->nullable();
            $table->timestamps();// This will create the created_at and the updated_at fields
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
