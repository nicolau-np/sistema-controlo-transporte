<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    static $cursos = [
        [
            'curso' => "Informática",
            'sigla' => "Info.",
        ], [
            'curso' => "Ciências Físicas Biológicas",
            'sigla' => "C.F.B",
        ], [
            'curso' => "Mecânica",
            'sigla' => "Mec.",
        ], [
            'curso' => "Ciências Humanas",
            'sigla' => "C.H",
        ],

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Self::$cursos as $curso) {
            Curso::create($curso);
        }
    }
}
