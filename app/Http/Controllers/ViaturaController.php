<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motoristas = Viatura::orderBy('id', 'asc')->paginate(10);
        $title = 'Viatura';
        $menu = 'Listar';
        $type = 'viaturas';

        return view('motoristas.index', compact('title', 'menu', 'type', 'motoristas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
