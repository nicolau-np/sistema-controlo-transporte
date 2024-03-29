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
                <form action="/estudantes/search" method="POST">
                <div class="row mb-4">

                        <div class="col-md-8">
                            <input type="text" wire:model="text_search" class="form-control" id=""
                                placeholder="Pesquisar..." />
                        </div>
                        <div class="col-md-1 mr-3">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/estudantes/create" class="btn btn-success">Novo</a>
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
                                <th>Turma</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estudantes as $estudante)
                                <tr>
                                    <td>{{ $estudante->pessoa->bi }}</td>

                                    <td>{{ $estudante->pessoa->nome }}</td>
                                    <td>{{ $estudante->pessoa->telefone }}</td>
                                    <td>{{ $estudante->turma->turma }}</td>
                                    <td>
                                        <a href="/estudantes/{{ $estudante->id }}/edit" class="btn btn-primary mr-3">Editar</a>
                                        <a href="/estudantes/{{ $estudante->id }}/extrato" class="btn btn-success mr-3">Extrato</a>
                                        <a href="/pagamentos/create/{{ $estudante->pessoa->bi }}" class="btn btn-warning mr-3">Pagar</a>
                                       <!-- <form action="/estudantes/{{ $estudante->id }}" method="POST">
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
            {{ $estudantes->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
