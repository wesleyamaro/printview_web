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
        /* Schema::create('blocked_termopatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('termopatch_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('termopatch_id')->references('id')->on('termopatches');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::dropIfExists('blocked_termopatches'); */
    }
};
