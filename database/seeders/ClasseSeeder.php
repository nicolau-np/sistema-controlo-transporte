<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    static $classes = [
        [
            'classe'=>"1º Ano",
        ],[
            'classe'=>"2º Ano",
        ],[
            'classe'=>"3º Ano",
        ],[
            'classe'=>"4º Ano",
        ],[
            'classe'=>"5º Ano",
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Self::$classes as $classe){
            Classe::create($classe);
        }
    }
}
