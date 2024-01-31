<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    static $classes = [
        [
            'classe'=>"10ª",
        ],[
            'classe'=>"11ª",
        ],[
            'classe'=>"12ª",
        ],[
            'classe'=>"13ª",
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
