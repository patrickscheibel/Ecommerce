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
        Schema::create('buy_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('supplier')->nullable();
            $table->text('product')->nullable();
            $table->string('price')->nullable();
            $table->string('payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buy_items');
    }
};
