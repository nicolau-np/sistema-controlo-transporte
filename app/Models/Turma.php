<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_id',
        'curso_id',
        'turma',
        'estado',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function estudante(){
        return $this->hasMany(Estudante::class, 'turma_id');
    }
}
