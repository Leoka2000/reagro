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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('standard');
            $table->integer('coins')->default('0');
            $table->string('address_city')->nullable();
            $table->string('delivery_address')->nullable(); // Delivery address eh na vdd a 'rua'
            $table->string('company_state')->nullable();
            $table->string('company_postal_code')->nullable();
            $table->string('email'); //i took out the unique for google to work
            $table->string('google_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
