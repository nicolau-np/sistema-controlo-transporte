<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViaturaMotorista extends Model
{
    use HasFactory;

    protected $fillable = [
        'viatura_id',
        'motorista_id',
        'data_atribuicao',
        'estado',
    ];

    public function viatura(){
        return $this->belongsTo(Viatura::class, 'viatura_id');
    }

    public function motorista(){
        return $this->belongsTo(Motorista::class, 'motorista_id');
    }
}
