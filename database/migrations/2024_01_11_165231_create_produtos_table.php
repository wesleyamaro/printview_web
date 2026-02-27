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
        /* Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia');
            $table->string('descricao')->nullable(); // Torna a coluna "descricao" opcional
            $table->string('genero');
            $table->string('filtros');

            $table->string('imagem');

            // Chave estrangeira
            $table->unsignedBigInteger('marca_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

    
            // Índice único para garantir que a referência seja única para cada gênero
            $table->unique(['referencia', 'genero']);

            $table->string('filtros');

            $table->integer('disabled');
            
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::dropIfExists('produtos'); */
    }
};
