<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id');
            $table->foreignId('childcategory_id');
            $table->foreignId('innerChild_id');
            $table->foreignId('brand_id');
            $table->foreignId('size_id');
            $table->foreignId('color_id');
            $table->foreignId('certification_id');
            $table->string('name');
            $table->decimal('purchase_price', 10, 2); // Change to decimal
            $table->decimal('wholesale_price', 10, 2); // Change to decimal
            $table->decimal('retail_price', 10, 2); // Change to decimal
            $table->integer('stock_qty'); // Change to integer
            $table->decimal('vat', 5, 2); // Change to decimal
            $table->decimal('tax', 5, 2)->nullable(); // Change to decimal
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
