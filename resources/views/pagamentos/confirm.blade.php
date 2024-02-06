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

                       <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              {{ $data['estudante_id'] }}
                            </div>
                        </div>
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
