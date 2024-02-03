<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Curso;
use App\Models\Estudante;
use App\Models\Pessoa;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EstudanteEditForm extends Component
{

    public $turmas, $estudante;

    public $classe_id, $turma_id, $curso_id, $nome, $telefone, $bi, $ano_lectivo;

    public function mount($id)
    {
        $this->setValues($id);
        $this->filterTurma();
    }

    public function setValues($id)
    {
        $this->estudante = Estudante::findOrFail($id);

        $this->nome = $this->estudante->pessoa->nome;
        $this->bi = $this->estudante->pessoa->bi;
        $this->telefone = $this->estudante->pessoa->telefone;
        $this->curso_id = $this->estudante->turma->curso_id;
        $this->classe_id = $this->estudante->turma->classe_id;
        $this->turma_id = $this->estudante->turma_id;
        $this->ano_lectivo = $this->estudante->ano_lectivo;
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
            'bi' => 'required|regex:/^\d{9}[a-zA-Z]{2}\d{3}$/',
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
            'turma_id' => $this->turma_id,
            'ano_lectivo' => $this->ano_lectivo,
        ];

        $data_pessoa = [
            'nome' => $this->nome,
            'bi' => $this->bi,
            'telefone' => $this->telefone,
        ];


        return DB::transaction(function () use ($data_pessoa, $data_estudante) {
         $pessoa = Pessoa::find($this->estudante->id)->update($data_pessoa);

            Estudante::find($this->estudante->id)->update($data_estudante);

            return back()->with('success', 'Feito com sucesso');
        });
    }

    public function render()
    {
        $classes = Classe::all();
        $cursos = Curso::all();
        return view('livewire.estudante-edit-form', compact('cursos', 'classes'));
    }
}
