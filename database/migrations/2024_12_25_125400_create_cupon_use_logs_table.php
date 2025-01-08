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
        Schema::create('cupon_use_logs', function (Blueprint $table) {
            $table->id();
            $table->integer("cupon_id");
            $table->string("cupon_code");
            $table->string("name");
            $table->integer("type")->default(1);
            $table->integer("amount")->default(0);
            $table->integer("user_id");
            $table->integer("order_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupon_use_logs');
    }
};
