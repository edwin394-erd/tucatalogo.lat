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
        Schema::create('catalogos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('divisa')->default('dolar');
            $table->string('description',1000)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plantilla_id')->default(1)->constrained('plantillas')->onDelete('cascade');
            $table->boolean('activo')->default(true);
            $table->string('banner_url')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('horario')->nullable();

            $table->string('color_primario')->default('#3490dc');
            $table->string('color_secundario')->default('#ffed4a');
            $table->string('color_fondo')->default('#ffffff');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogos');
    }
};
