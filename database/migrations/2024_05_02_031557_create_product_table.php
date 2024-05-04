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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->double('price');
            $table->double('cost');
            $table->double('image')->nullable(true);
            $table->string('notes')->nullable(true);
            
            $table->foreign('manufacturer_id')->references('id')->on('manufacturer');
            $table->foreign('category_id')->references('id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
