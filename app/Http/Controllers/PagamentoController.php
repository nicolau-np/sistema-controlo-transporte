<?php

namespace App\Http\Controllers;

use App\Models\Meses;
use App\Models\Pessoa;
use App\Models\TabelaPreco;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{

    public function create($bi = null)
    {
        $pessoa = null;
        if ($bi) {
            $pessoa = Pessoa::where('bi', $bi)->whereHas('estudante')->first();
            if (!$pessoa)
                return back()->with('error', 'Bilhete de Identidade Inválido');
        }
        $meses = Meses::orderBy('id', 'asc')->get();
        $tabela_preco = TabelaPreco::orderBy('id', 'desc')->get()->first();
        $title = 'Pagamentos';
        $menu = 'Pagar';
        $type = 'pagamentos';

        return view('pagamentos.create', compact('title', 'menu', 'type', 'bi', 'meses', 'tabela_preco', 'pessoa'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'bi' => 'required|string|exists:pessoas,bi',
            'mes_id' => 'required|integer|exists:meses,id',
            'preco'
        ], [], []);
    }

    public function store()
    {
    }
}
