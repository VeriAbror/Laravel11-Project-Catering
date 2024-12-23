<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers', 'id');
            $table->dateTime('event_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_method', ['cash', 'e-money']);
            $table->enum('order_status', ['pending', 'delivered']);
            $table->json('details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
