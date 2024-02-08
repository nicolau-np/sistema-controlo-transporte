@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $menu }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            @include('include.message')

            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <i class="fas fa-file fa-2x mb-2"></i>
                                <h3><a href="/reports/balanco-create">Balanço</a></h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
