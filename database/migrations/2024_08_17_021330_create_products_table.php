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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('stock')->nullable();
            $table->string('image');
            $table->integer("category_id");
            $table->integer("sub_category_id")->nullable();
            $table->integer("status")->default(1);
            $table->text("short_description")->nullable();
            $table->text("description")->nullable();
            $table->integer("min_stock")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
