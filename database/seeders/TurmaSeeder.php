<?php

namespace Database\Seeders;

use App\Models\Turma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurmaSeeder extends Seeder
{
    static $turmas = [
        [
            'classe_id' => 1,
            'curso_id' => 1,
            'turma' => "Info.1",
        ], [
            'classe_id' => 2,
            'curso_id' => 1,
            'turma' => "Info.1",
        ], [
            'classe_id' => 3,
            'curso_id' => 1,
            'turma' => "Info.1",
        ], [
            'classe_id' => 4,
            'curso_id' => 1,
            'turma' => "Info.1",
        ],


        [
            'classe_id' => 1,
            'curso_id' => 2,
            'turma' => "Info.1",
        ], [
            'classe_id' => 2,
            'curso_id' => 2,
            'turma' => "Info.1",
        ], [
            'classe_id' => 3,
            'curso_id' => 2,
            'turma' => "Info.1",
        ], [
            'classe_id' => 4,
            'curso_id' => 2,
            'turma' => "Info.1",
        ],


        [
            'classe_id' => 1,
            'curso_id' => 3,
            'turma' => "Info.1",
        ], [
            'classe_id' => 2,
            'curso_id' => 3,
            'turma' => "Info.1",
        ], [
            'classe_id' => 3,
            'curso_id' => 3,
            'turma' => "Info.1",
        ], [
            'classe_id' => 4,
            'curso_id' => 3,
            'turma' => "Info.1",
        ],

        [
            'classe_id' => 1,
            'curso_id' => 4,
            'turma' => "Info.1",
        ], [
            'classe_id' => 2,
            'curso_id' => 4,
            'turma' => "Info.1",
        ], [
            'classe_id' => 3,
            'curso_id' => 4,
            'turma' => "Info.1",
        ], [
            'classe_id' => 4,
            'curso_id' => 4,
            'turma' => "Info.1",
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Self::$turmas as $turma) {
            Turma::create($turma);
        }
    }
}
