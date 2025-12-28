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
        Schema::create('settings', function (Blueprint $table) {
          $table->id();
    $table->string('store_name');
    $table->text('store_description')->nullable();
    $table->boolean('cash_on_delivery')->default(true);
    $table->decimal('delivery_fee', 8, 2)->default(0);
    $table->string('store_email')->nullable();
    $table->string('store_phone')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
