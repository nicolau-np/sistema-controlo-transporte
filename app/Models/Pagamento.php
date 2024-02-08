<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [
       'estudante_id',
       'mes_id',
       'viatura_id',
       'ano',
       'valor',
       'data_pagamento',
       'estado',
    ];

    public function estudante(){
        return $this->belongsTo(Estudante::class, 'estudante_id');
    }

    public function mes(){
        return $this->belongsTo(Meses::class, 'mes_id');
    }

    public function viatura(){
        return $this->belongsTo(Viatura::class, 'viatura_id');
    }
}
