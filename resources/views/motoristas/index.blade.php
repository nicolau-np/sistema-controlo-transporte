@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                @include('include.message')
                <form action="/motoristas/search" method="POST">
                <div class="row mb-4">

                        <div class="col-md-8">
                            <input type="text" wire:model="text_search" class="form-control" id=""
                                placeholder="Pesquisar..." />
                        </div>
                        <div class="col-md-1 mr-3">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/motoristas/create" class="btn btn-success">Novo</a>
                        </div>

                </div>
            </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>B.I</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Nº da Carta</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($motoristas as $motorista)
                                <tr>
                                    <td>{{ $motorista->pessoa->bi }}</td>

                                    <td>{{ $motorista->pessoa->nome }}</td>
                                    <td>{{ $motorista->pessoa->telefone }}</td>
                                    <td>{{ $motorista->numero_carta }}</td>
                                    <td>
                                        <a href="/motoristas/{{ $motorista->id }}/edit" class="btn btn-primary">Editar</a>
                                       <!-- <form action="/motoristas/{{ $motorista->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>-->

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="paginate">
            {{ $motoristas->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
