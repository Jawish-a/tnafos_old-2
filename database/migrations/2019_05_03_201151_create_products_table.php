<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('productName');
            $table->longText('productDescription')->nullable();
            $table->string('productSku')->nullable();
            $table->string('productBarcode')->nullable();
            $table->string('productVersion')->nullable();
            $table->string('productEdition')->nullable();
            // product specs
            $table->string('productWeight')->nullable();
            $table->string('productDimensionsX')->nullable();
            $table->string('productDimensionsY')->nullable();
            $table->string('productDimensionsZ')->nullable();
            $table->string('productImage')->nullable();
            // product videos
            // product attributes
            // product specifications
            // product category
            // product type
            // product vendors
            // foreign keys to be here
            $table->string('brand_id')->nullable();
            $table->string('category_id')->nullable();

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
