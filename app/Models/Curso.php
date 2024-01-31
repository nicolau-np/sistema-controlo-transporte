<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso',
        'sigla',
        'estado',
    ];

    public function turma(){
        return $this->hasMany(Turma::class, 'turma_id');
    }
}
