<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe',
        'estado',
    ];

    public function turma(){
        return $this->hasMany(Turma::class, 'classe_id');
    }
}
