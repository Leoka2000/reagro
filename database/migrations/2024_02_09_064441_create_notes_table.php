<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Decimal;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->string('typeof_frete')->nullable();
            $table->string('address_city');
            $table->boolean('paid')->default(false);
            $table->string('company_email');
            $table->string('postal_code');
            $table->string('company_state')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('delivery_address');     // Delivery address eh na vdd a 'rua'
            $table->decimal('price')->nullable();
            $table->decimal('price_perunit')->nullable();
            $table->text('description')->nullable();
            $table->string('residue_type')->nullable();
            $table->string('image');
            $table->boolean('accept_terms')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('heart_count')->default(0);
            $table->timestamps();
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
