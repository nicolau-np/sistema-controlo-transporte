<?php

namespace App\Livewire;

use App\Models\Estudante;
use Livewire\Component;
use Livewire\WithPagination;

class EstudanteListTable extends Component
{
    use WithPagination;

    public $text_search;

    public function render()
    {
        if ($this->text_search == null) {
            $estudantes = Estudante::orderBy('id', 'asc')->paginate(10);
        } else {
            $estudantes = Estudante::orderBy('id', 'asc')
                ->whereHas('pessoas', function ($query) {
                    $query->where('nome', 'LIKE', "%{$this->text_search}%")
                        ->orWhere('bi', 'LIKE', "%{$this->text_search}%");
                })->paginate(10);
        }


        return view('livewire.estudante-list-table', compact('estudantes'));
    }
}
