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
        /* Schema::create('regra_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('regra_id');
        
            $table->timestamps();

            // Adicione as chaves estrangeiras
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('regra_id')->references('id')->on('regras');
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::dropIfExists('regra_users'); */
    }
};
