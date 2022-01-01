<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('parent_id')->default(0);
            $table->String('title',150);
            $table->String('keywords')->nullable();
            $table->String('description')->nullable();
            $table->String('images',75)->nullable();
            $table->String('slug',100)->nullable();
            $table->String('status',5)->nullable()->default('False');
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
        Schema::dropIfExists('categories');
    }
}
