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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key to products table
            $table->string('attribute_name')->nullable(); // e.g., "Size", "Color"
            $table->string('attribute_value')->nullable(); // e.g., "Small", "Red"
            $table->decimal('price', 8, 2); // Price for this specific variant
            $table->integer('stock')->nullable(); // Stock for this variant
            $table->string('image')->nullable(); // Optional image for the variant
            $table->integer('status')->default(1); // Status (active/inactive)    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
