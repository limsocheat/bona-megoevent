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
            $table->id();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->string('name');
            $table->binary('image')->nullable();
            $table->double('price')->nullable()->default(0);
            $table->integer('quantity')->nullable()->default(0);
            $table->text('description');
            $table->timestamps();

             $table->foreign('category_id')->references('id')->on('product_category')->onDelete('set null');
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
