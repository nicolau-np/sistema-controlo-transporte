<?php

namespace App\Livewire;

use App\Models\Viatura;
use Livewire\Component;

class InputsChooseViatura extends Component
{
    public $viaturas;

    protected $listeners = [
        'selectedMes'=>'selectedMes',
    ];

    public function selectedMes($mes_id){
        $viaturas = Viatura::orderBy('id', 'asc')->get();
        $this->viaturas = $viaturas;
    }

    public function render()
    {
        return view('livewire.inputs-choose-viatura');
    }
}
