<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_for_client');
            $table->string('city', 50);
            $table->string('target_name', 255)->nullable();
            $table->string('target_references', 255)->nullable();
            $table->string('target_phone', 15);
            $table->string('target_city', 50);
            $table->string('product_type', 25);
            $table->decimal('product_price');
            $table->tinyInteger('status')->default(0);
            $table->decimal('amount');
            $table->string('payment_method', 50)->nullable();
            $table->timestamp('paid_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
