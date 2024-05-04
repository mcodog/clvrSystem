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
        Schema::table('product', function($table)
        {
            $table->unsignedBigInteger('category_id')->default(null)->nullable(true)->change();
            $table->unsignedBigInteger('manufacturer_id')->default(null)->nullable(true)->change();
            $table->double('price')->default(0)->change();
            $table->double('cost')->default(0)->change();

            $table->dropForeign(['category_id']);
            $table->dropForeign(['manufacturer_id']);

            $table->foreign('manufacturer_id')->references('id')->on('manufacturer')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
