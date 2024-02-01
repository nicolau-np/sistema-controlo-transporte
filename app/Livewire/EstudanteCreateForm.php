<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Curso;
use Livewire\Component;

class EstudanteCreateForm extends Component
{
public $turmas;

public $classe, $turma, $curso, $nome, $telefone, $bi, $ano_lectivo;

public function mount(){
    $this->filterTurma();
}

public function filterTurma(){
    if($this->classe!=null && $this->curso!=null){

    }
}

    public function render()
    {
        $classes = Classe::all();
        $cursos = Curso::all();
        return view('livewire.estudante-create-form', compact('cursos', 'classes'));
    }
}
