<?php

namespace Database\Seeders;

use App\Models\Meses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MesSeeder extends Seeder
{
    static $meses = [
        [
            'numero_ordem' => 1,
            'mes' => "Janeiro",
        ], [
            'numero_ordem' => 2,
            'mes' => "Fevereiro",
        ], [
            'numero_ordem' => 3,
            'mes' => "Março",
        ], [
            'numero_ordem' => 4,
            'mes' => "Abril",
        ], [
            'numero_ordem' => 5,
            'mes' => "Maio",
        ], [
            'numero_ordem' => 6,
            'mes' => "Junho",
        ], [
            'numero_ordem' => 7,
            'mes' => "Julho",
        ], [
            'numero_ordem' => 8,
            'mes' => "Agosto",
        ], [
            'numero_ordem' => 9,
            'mes' => "Setembro",
        ], [
            'numero_ordem' => 10,
            'mes' => "Outubro",
        ], [
            'numero_ordem' => 11,
            'mes' => "Novembro",
        ], [
            'numero_ordem' => 12,
            'mes' => "Dezembro",
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Self::$meses as $mes){
            Meses::create($mes);
        }
    }
}
