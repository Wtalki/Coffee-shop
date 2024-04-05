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
        Schema::create('contact_shops', function (Blueprint $table) {
           $table->id();
            $table->string('shop_name',30);
            $table->string('address', 50);
            $table->string('phone', 20);
            $table->string('email', 30);
            $table->string('opening_hours', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_shops');
    }
};