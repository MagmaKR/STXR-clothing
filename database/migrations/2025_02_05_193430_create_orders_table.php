<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Orders;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('order_date');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('delivery_amount', 8, 2);
            $table->decimal('Net_cost', 10, 2);
            $table->enum('DeliveryStatus', Orders::$DeliveryStatus);
            $table->text('order_items');

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
