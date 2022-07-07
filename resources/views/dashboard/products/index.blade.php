@extends('layouts.app')
@section('title', 'Products')

@section('title-header', 'Products')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Products</li>
@endsection
@section('content')
    {{-- modal content --}}
    <div id="modal-row"></div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Products</h2>
                    <div class="table-responsive">
                        <table class="table table-flush table-hover" id="table-data">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product Name</th>
                                    <th>Product Merk</th>
                                    <th>Product Price</th>
                                    <th>Product Description</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('_partials.cjs.ajaxPromise')
    @include('dashboard.products.script')
@endsection
