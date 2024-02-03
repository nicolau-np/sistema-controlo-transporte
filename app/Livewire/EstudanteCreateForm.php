<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Curso;
use App\Models\Estudante;
use App\Models\Pessoa;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EstudanteCreateForm extends Component
{
    public $turmas;

    public $classe_id, $turma_id, $curso_id, $nome, $telefone, $bi, $ano_lectivo;

    public function mount()
    {
        $this->filterTurma();
        $this->setValues();
    }

    public function setValues()
    {
        $this->ano_lectivo = "2023-2024";
    }

    public function filterTurma()
    {
        if ($this->classe_id != null && $this->curso_id != null) {
            $this->turmas = Turma::where(['curso_id' => $this->curso_id, 'classe_id' => $this->classe_id])->get();
        }
    }

    public function submit()
    {
        $this->validate([
            'nome' => 'required|string|min:6',
            'bi' => 'required|regex:/^\d{9}[a-zA-Z]{2}\d{3}$/|unique:pessoas,bi',
            'telefone' => 'required|regex:/^9\d{8}$/',
            'curso_id' => 'required|integer',
            'classe_id' => 'required|integer',
            'turma_id' => 'required|integer',
            'ano_lectivo' => 'required|string'
        ], [], [
            'nome' => 'Nome Completo',
            'bi' => 'Nº de Bilhete',
            'telefone' => 'Nº de Telefone',
            'curso_id' => 'Curso',
            'classe_id' => 'Ano',
            'turma_id' => 'Turma',
            'ano_lectivo' => 'Ano Lectivo'
        ]);

        $data_estudante = [
            'pessoa_id' => null,
            'turma_id' => $this->turma_id,
            'ano_lectivo' => $this->ano_lectivo,
        ];

        $data_pessoa = [
            'nome' => $this->nome,
            'bi' => $this->bi,
            'telefone' => $this->telefone,
        ];


        return DB::transaction(function () use ($data_pessoa, $data_estudante) {
            $pessoa = Pessoa::create($data_pessoa);
            $data_estudante['pessoa_id'] = $pessoa->id;
            Estudante::create($data_estudante);
            $this->clearFields();
            return back()->with('success', 'Feito com sucesso');
        });
    }

    public function clearFields()
    {
        $this->curso_id = null;
        $this->classe_id = null;
        $this->turma_id = null;
        $this->nome = null;
        $this->bi = null;
        $this->telefone = null;
        $this->ano_lectivo = null;
        $this->turmas = null;
    }

    public function render()
    {
        $classes = Classe::all();
        $cursos = Curso::all();
        return view('livewire.estudante-create-form', compact('cursos', 'classes'));
    }
}
