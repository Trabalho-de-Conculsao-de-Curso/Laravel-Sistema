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
        Schema::create('produto_final', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('categoria');
            $table->integer('preco_total');
            $table->string('cpu');
            $table->string('gpu');
            $table->string('ram');
            $table->string('hdd');
            $table->string('fonte');
            $table->string('placa_mae');
            $table->string('cooler');
            $table->timestamps();
        });

        Schema::create('produto_final_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_final_id')->constrained()->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('produto_final_software', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_final_id')->constrained()->onDelete('cascade');
            $table->foreignId('software_id')->constrained('softwares')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_final_software');
        Schema::dropIfExists('produto_final_produto');
        Schema::dropIfExists('produto_finals');
    }
};
