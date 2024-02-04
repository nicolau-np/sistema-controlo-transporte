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
                <form action="/viaturas/search" method="POST">
                <div class="row mb-4">

                        <div class="col-md-8">
                            <input type="text" wire:model="text_search" class="form-control" id=""
                                placeholder="Pesquisar..." />
                        </div>
                        <div class="col-md-1 mr-3">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/viaturas/create" class="btn btn-success">Novo</a>
                        </div>

                </div>
            </form>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Cor</th>
                                <th>Lugares</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viaturas as $viatura)
                                <tr>
                                    <td>{{ $viatura->matricula }}</td>

                                    <td>{{ $viatura->marca }}</td>
                                    <td>{{ $viatura->modelo }}</td>
                                    <td>{{ $viatura->cor }}</td>
                                    <td>{{ $viatura->numero_lugares }}</td>
                                    <td>
                                        <a href="/viaturas/{{ $viatura->id }}/edit" class="btn btn-primary">Editar</a>
                                       <!-- <form action="/viaturas/{{ $viatura->id }}" method="POST">
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
            {{ $viaturas->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
