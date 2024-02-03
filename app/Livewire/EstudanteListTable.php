<?php

namespace App\Livewire;

use App\Models\Estudante;
use Livewire\Component;
use Livewire\WithPagination;

class EstudanteListTable extends Component
{
    use WithPagination;

    public function render()
    {
            $estudantes = Estudante::orderBy('id', 'asc')->paginate(10);

        return view('livewire.estudante-list-table', compact('estudantes'));
    }
}
