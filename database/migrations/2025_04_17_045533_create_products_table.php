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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('features')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('image');
            $table->json('gallery')->nullable();
            $table->boolean('featured')->default(false);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('reviews_count')->default(0);
            $table->json('colors')->nullable();
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
