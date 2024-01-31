<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'marca',
        'modelo',
        'cor',
        'numero_lugares',
        'estado',
    ];

    public function viaturaMotorista(){
        return $this->hasMany(ViaturaMotorista::class, 'viatura_id');
    }
}
