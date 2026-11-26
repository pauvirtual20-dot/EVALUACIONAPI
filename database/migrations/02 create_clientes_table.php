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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")-> unique();
            $table->string("tipo_de_documento", 30);
            $table->string("numero_documento", 30)-> unique();
            $table->string("nombres", 150);
            $table->string("apellidos", 150);
            $table->string("correo", 255)->unique();
            $table->string("telefono", 30);
            $table->string("direccion", 255);

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign("user_id")->references("id")->on("user")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
