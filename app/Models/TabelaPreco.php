<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelaPreco extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'preco',
        'data_implementacao',
        'estado',
    ];
}
