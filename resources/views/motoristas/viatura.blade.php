@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <form method="POST" action="/motoristas/{{ $motorista->id }}/viatura">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        @include('include.message')

                        <div class="col-md-5 mb-3">
                            <label for="">Motorista <span class="text-danger">*</span></label>
                            <input type="text" name="nome" placeholder="Nome Completo" class="form-control"
                                value="{{ old('nome', $motorista->pessoa->nome) }}" disabled />
                            @if ($errors->has('nome'))
                                <span class="text-danger">{{ $errors->first('nome') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Data de Atribuição <span class="text-danger">*</span></label>
                            <input type="date" name="data_atribuicao" placeholder="Data de Atribuição" class="form-control"
                                value="{{ old('data_atribuicao', null) }}" />
                            @if ($errors->has('data_atribuicao'))
                                <span class="text-danger">{{ $errors->first('data_atribuicao') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Viatura <span class="text-danger">*</span></label>
                            <select name="viatura_id" class="form-control">
                                <option value="" hidden>Viatura</option>
                                @foreach ($viaturas as $viatura)
                                <option value="{{$viatura->id}}">{{$viatura->matricula}} [{{ $viatura->marca }} {{$viatura->modelo}}]</option>
                                @endforeach
                            </select>
                            @if ($errors->has('viatura_id'))
                                <span class="text-danger">{{ $errors->first('viatura_id') }}</span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>

                </form>
            </div>

            <div class="col-md-12">
                <div class="table-resposive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Data Atribuição</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viatura_motoristas as $viatura_motorista)
                            <tr>
                                <td>{{ $viatura_motorista->viatura->matricula }}</td>
                                <td>{{ $viatura_motorista->viatura->marca }}</td>
                                <td>{{ $viatura_motorista->viatura->modelo }}</td>
                                <td>{{ date('d-m-Y', strtotime($viatura_motorista->data_atribuicao)) }}</td>
                                <td>
                                    <a href="/motoristas/viatura/destroy/{{ $viatura_motorista->id }}" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
