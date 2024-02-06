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
                <form method="POST" action="/pagamentos">
                    @method('POST')
                    @csrf

                    <div class="row">
                        @include('include.message')

                        <div class="col-md-5 mb-3">
                            <label for="">Nº do Bilhete <span class="text-danger">*</span></label>
                            <input type="text" name="bi" placeholder="Nº do Bilhete" class="form-control"
                                value="{{ old('bi', null) }}" />
                            @if ($errors->has('bi'))
                                <span class="text-danger">{{ $errors->first('bi') }}</span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
