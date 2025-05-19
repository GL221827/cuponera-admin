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
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('id_Usuario', true);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('telefono', 50);
            $table->string('correo', 100)->unique('correo');
            $table->string('direccion', 200);
            $table->string('DUI', 15);
            $table->string('contra', 128);
            $table->integer('id_tipo_usuario')->index('id_tipo_usuario');
            $table->string('codigo_verificacion')->nullable();
            $table->boolean('verificado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
