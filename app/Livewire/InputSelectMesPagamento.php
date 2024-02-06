<?php

namespace App\Livewire;

use App\Models\Meses;
use Livewire\Component;

class InputSelectMesPagamento extends Component
{
    public $meses;
    public $mes_id;

    public function mount()
    {
        $meses = Meses::orderBy('id', 'asc')->get();
        $this->meses = $meses;
    }

    public function selectMes()
    {
        if ($this->mes_id != null)
            $this->dispatch('selectedMes', ['mes_id' => $this->mes_id]);
    }

    public function render()
    {
        return view('livewire.input-select-mes-pagamento');
    }
}
