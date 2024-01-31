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
        Schema::create('viatura_motoristas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('viatura_id');
            $table->unsignedBigInteger('motorista_id');
            $table->date('data_atribuicao');
            $table->string('estado')->default('on');
            $table->timestamps();

            $table->foreign('viatura_id')->references('id')->on('viaturas')->onDelete('cascade');
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viatura_motoristas');
    }
};
