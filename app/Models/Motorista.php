<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $fillable = [
      'pessoa_id',
      'numero_carta',
      'estado',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function motoristaViatura(){
        return $this->hasMany(ViaturaMotorista::class, 'motorista_id');
    }
}
