<?php

namespace App\Livewire;

use App\Models\Pagamento;
use App\Models\Viatura;
use Livewire\Component;

class InputsChooseViatura extends Component
{
    public $viaturas;

    protected $listeners = [
        'selectedMes' => 'selectedMes',
    ];

    public function selectedMes($mes_id)
    {
        $viatura_array = [];
        $lugares_disponiveis_viatura = 0;
        $viaturas = Viatura::orderBy('id', 'asc')->where('estado', 'on')->get();

        foreach ($viaturas as $viatura) {
            $lugares_disponiveis_viatura = $viatura->numero_lugares;
            $lugares_pagos_viatura = Pagamento::where(['mes_id' => $mes_id, 'ano' => date('Y'), 'viatura_id' => $viatura->id])->count();

            $lugares_disponiveis_viatura = $viatura->numero_lugares - $lugares_pagos_viatura;

            $viatura_array[] = [
                'id'=>$viatura->id,
                'matricula' => $viatura->matricula,
                'marca' => $viatura->marca,
                'modelo' => $viatura->modelo,
                'cor' => $viatura->cor,
                'numero_lugares' => $viatura->numero_lugares,
                'lugares_disponiveis' => $lugares_disponiveis_viatura,
                'disponibilidade' => $lugares_disponiveis_viatura == 0 ? 'Indisponivel' : 'Disponivel',
                'estado' => $viatura->estado,
            ];
        }

        $this->viaturas = $viatura_array;
    }

    public function render()
    {
        return view('livewire.inputs-choose-viatura');
    }
}
