<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'bi',
        'telefone',
        'estado',
    ];

    public function motorista()
    {
        return $this->hasMany(Motorista::class, 'pessoa_id');
    }

    public function estudante(){
        return $this->hasMany(Estudante::class, 'pessoa_id');
    }
}
