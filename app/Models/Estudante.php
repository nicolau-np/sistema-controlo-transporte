<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id',
        'turma_id',
        'numero_estudante',
        'ano_lectivo',
        'estado',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function pagamento(){
        return $this->hasMany(Pagamento::class, 'estudante_id');
    }

}
