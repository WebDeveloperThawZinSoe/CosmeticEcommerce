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
        Schema::create('cupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string("cupon_code")->unique();
            $table->string("name");
            $table->integer("type")->default(1);
            $table->integer("amount")->default(0);
            $table->integer("code_limit")->default(0);
            $table->text("description")->nullable();
            $table->integer("status")->default(1);
            $table->datetime("start_date")->nullable(); 
            $table->datetime("end_date")->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cupon_codes');
    }
};
