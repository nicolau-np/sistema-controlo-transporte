<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
    use HasFactory;

    protected $fillable = [
       'numero_ordem',
        'mes',
        'estado',
    ];

    public function pagamento(){
        return $this->hasMany(Pagamento::class, 'mes_id');
    }

}
