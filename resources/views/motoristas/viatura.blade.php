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
        </div>
    </div>
@endsection
