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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('product_type')->default(1); 
            $table->integer('discount_type')->default(0); // 0 is nothing , 1 is amount , 2 is %
            $table->integer('discount_amount')->nullalbe();
            $table->text("images")->nullable();
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->integer('discount_type')->default(0); // 0 is nothing , 1 is amount , 2 is %
            $table->integer('discount_amount')->nullalbe();
            $table->text("images")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
           
        });

        Schema::table('product_variants', function (Blueprint $table) {
        
        });
    }
};
