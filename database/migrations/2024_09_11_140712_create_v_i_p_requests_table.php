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
        Schema::create('v_i_p_requests', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("type_id");
            $table->integer("status")->default(0);
            $table->text("comment")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_i_p_requests');
    }
};
