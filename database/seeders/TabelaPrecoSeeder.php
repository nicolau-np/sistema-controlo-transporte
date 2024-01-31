<?php

namespace Database\Seeders;

use App\Models\TabelaPreco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TabelaPrecoSeeder extends Seeder
{
    static $tabela_precos = [
        [
            'descricao' => "Transporte Escolar",
            'preco' => "7500",
            'data_implementacao' => "2024-01-31",
        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Self::$tabela_precos as $tabela_preco) {
            TabelaPreco::create($tabela_preco);
        }
    }
}
