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
                <form method="POST" action="/motoristas/{{ $motorista->id }}">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        @include('include.message')

                        <div class="col-md-5 mb-3">
                            <label for="">Nome Completo <span class="text-danger">*</span></label>
                            <input type="text" name="nome" placeholder="Nome Completo" class="form-control"
                                value="{{ old('nome', $motorista->pessoa->nome) }}" />
                            @if ($errors->has('nome'))
                                <span class="text-danger">{{ $errors->first('nome') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Nº de Bilhete <span class="text-danger">*</span></label>
                            <input type="text" name="bi" placeholder="Nº de Bilhete" class="form-control"
                                value="{{ old('bi', $motorista->pessoa->bi) }}" />
                            @if ($errors->has('bi'))
                                <span class="text-danger">{{ $errors->first('bi') }}</span>
                            @endif
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Nº de Telefone <span class="text-danger">*</span></label>
                            <input type="number" name="telefone" placeholder="Nº de Telefone" class="form-control"
                                value="{{ old('telefone', $motorista->pessoa->telefone) }}" />
                            @if ($errors->has('telefone'))
                                <span class="text-danger">{{ $errors->first('telefone') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Nº da Carta <span class="text-danger">*</span></label>
                            <input type="text" name="numero_carta" placeholder="Nº da Carta" class="form-control"
                                value="{{ old('numero_carta', $motorista->numero_carta) }}" />
                            @if ($errors->has('numero_carta'))
                                <span class="text-danger">{{ $errors->first('numero_carta') }}</span>
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
