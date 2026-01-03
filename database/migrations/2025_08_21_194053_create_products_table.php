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
            $table->text('description')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('catalogo_id')->constrained()->onDelete('cascade');
            $table->foreignId('descuento_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('visible')->default(true);
            $table->decimal('price', 10, 2);
            $table->enum('stock', ['Alto', 'Medio', 'Bajo', 'Agotado'])->nullable();
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
