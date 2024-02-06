<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagamentoController extends Controller
{

    public function create()
    {
        $title = 'Pagamentos';
        $menu = 'Pagar';
        $type = 'pagamentos';

        return view('pagamentos.create', compact('title', 'menu', 'type'));
    }
}
