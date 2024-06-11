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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('marca_id')->nullable()->constrained()->unique()->onDelete('cascade');
            $table->foreignId('especificacoes_id')->nullable()->constrained()->unique()->onDelete('cascade');
            $table->decimal('preco', 10, 2);
            $table->string('lojaOnline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
