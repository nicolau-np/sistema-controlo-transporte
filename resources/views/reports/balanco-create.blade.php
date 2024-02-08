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
                <form action="/reports/balanco" method="GET">
                    @method('GET')
                    @csrf
                    <div class="row mb-4">

                        <div class="col-md-3">
                            <label for="">Data Inicial</label>
                            <input type="date" name="data_inicial" class="form-control" id=""
                                placeholder="Data Inicial" />
                                @if($errors->has('data_inicial'))
                                <span class="text-danger">{{ $errors->first('data_inicial') }}</span>
                                @endif
                        </div>
                        <div class="col-md-3">
                            <label for="">Data Final</label>
                            <input type="date" name="data_final" class="form-control" id=""
                                placeholder="Data Final" />
                                @if($errors->has('data_final'))
                                <span class="text-danger">{{ $errors->first('data_final') }}</span>
                                @endif
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Imprimir</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
