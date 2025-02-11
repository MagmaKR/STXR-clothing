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
        Schema::create('stock_management', function (Blueprint $table) {
            $table->id();

            $table->foreignId('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('colours_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreignId('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->unsignedInteger('quantity_left_of_product');


            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_management');
    }
};
