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
        /* Schema::create('carrinho_compras', function (Blueprint $table) {

            $table->id();

            
            $table->integer('quantidade');

            $table->string('imagem_cliente')->nullable(); // Caminho ou nome do arquivo da imagem do cliente

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos'); // Substitua 'produtos' pelo nome da sua tabela de produtos
            
            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::dropIfExists('carrinho_compras'); */
    }
};
