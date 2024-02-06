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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudante_id');
            $table->unsignedBigInteger('mes_id');
            $table->unsignedBigInteger('viatura_id')->nullable();
            $table->integer('ano');
            $table->string('valor');
            $table->string('estado')->default('on');
            $table->timestamps();

            $table->foreign('estudante_id')->references('id')->on('estudantes')->onDelete('cascade');
            $table->foreign('mes_id')->references('id')->on('meses')->onDelete('cascade');
            $table->foreign('viatura_id')->references('id')->on('viaturas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
