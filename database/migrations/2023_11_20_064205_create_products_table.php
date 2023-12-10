<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
   public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug');
        $table->decimal('price', 10, 2);
        $table->decimal('compare_price', 10, 2)->nullable();
        $table->string('sku');
        $table->string('barcode')->nullable();
        $table->text('description')->nullable();
        $table->integer('qty')->nullable();
        $table->unsignedBigInteger('category_id'); // Use unsignedBigInteger for foreign keys
        $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        $table->integer('status')->default(1);
        $table->enum('is_featured', ['Yes', 'No'])->default('No');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
