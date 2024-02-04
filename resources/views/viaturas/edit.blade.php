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
                <form method="POST" action="/viaturas/{{ $viatura->id }}">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        @include('include.message')

                        <div class="col-md-5 mb-3">
                            <label for="">Matrícula <span class="text-danger">*</span></label>
                            <input type="text" name="matricula" placeholder="Matrícula" class="form-control"
                                value="{{ old('matricula', $viatura->matricula) }}" />
                            @if ($errors->has('matricula'))
                                <span class="text-danger">{{ $errors->first('matricula') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Marca <span class="text-danger">*</span></label>
                            <input type="text" name="marca" placeholder="Marca" class="form-control"
                                value="{{ old('marca', $viatura->marca) }}" />
                            @if ($errors->has('marca'))
                                <span class="text-danger">{{ $errors->first('marca') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Modelo <span class="text-danger">*</span></label>
                            <input type="text" name="modelo" placeholder="Modelo" class="form-control"
                                value="{{ old('modelo', $viatura->modelo) }}" />
                            @if ($errors->has('modelo'))
                                <span class="text-danger">{{ $errors->first('modelo') }}</span>
                            @endif
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="">Cor</label>
                            <input type="text" name="cor" placeholder="Cor" class="form-control"
                                value="{{ old('cor', $viatura->cor) }}" />
                            @if ($errors->has('cor'))
                                <span class="text-danger">{{ $errors->first('cor') }}</span>
                            @endif
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="">Nº de Lugares <span class="text-danger">*</span></label>
                            <input type="number" name="numero_lugares" placeholder="Nº de Lugares" class="form-control"
                                value="{{ old('numero_lugares', $viatura->numero_lugares) }}" />
                            @if ($errors->has('numero_lugares'))
                                <span class="text-danger">{{ $errors->first('numero_lugares') }}</span>
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
