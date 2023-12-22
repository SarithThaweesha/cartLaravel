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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->json('book_id'); 
            $table->json('book_name');
            $table->string("name",255)->nullable();
            $table->string("address",255)->nullable();
            $table->string("country",255)->nullable();
            $table->string("city",255)->nullable();
            $table->string("ZIP",255)->nullable();
            $table->string("phone",255)->nullable();
            $table->string("status",255)->nullable();
            $table->decimal("total",6,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
