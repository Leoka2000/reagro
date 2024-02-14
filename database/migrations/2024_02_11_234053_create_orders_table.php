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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status');
            $table->string('company_email')->nullable();
            $table->string('order_product_name')->nullable();
            $table->string('order_paid')->default('unpaid');
            $table->string('order_company_state')->nullable();
            $table->string('order_address_city')->nullable();
            $table->string('order_postal_code')->nullable();;
            $table->string('order_delivery_address')->nullable();
            $table->string('order_residue_type')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('session_id');
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
