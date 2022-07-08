@extends('layouts.app')
@section('title', 'Products ' . str()->title($product->name))

@section('title-header', 'Products {{str()->title($product->name)}}')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
    <li class="breadcrumb-item active">Products {{str()->limit(str()->title($product->name), 10)}}</li>
@endsection

@section('c_css')
    <style>
        #prodetails {
            display: flex;
            margin-top: 20px;
        }

        #prodetails .single-pro-image {
            width: 40%;
            margin-right: 50px;
        }

        .small-image-group {
            display: flex;
            justify-content: space-between;
        }

        .small-image-col {
            flex-basis: 24%;
            cursor: pointer;
        }

        #prodetails .single-pro-details {
            width: 50%;
            padding-top: 30px;
        }

        #prodetails .single-pro-details h4 {
            padding: 40px 0 20px 0;
        }


        #prodetails .single-pro-details h2 {
            font-size: 26px;
        }

        #prodetails .single-pro-details select {
            display: block;
            padding: 5px 10px;
            margin-bottom: 10px;
        }

        #prodetails .single-pro-details input {
            width: 50px;
            height: 47px;
            padding-left: 10px;
            font-size: 16px;
            margin-right: 10px;
        }

        #prodetails .single-pro-details input:focus {
            outline: none;
        }

        #prodetails .single-pro-details button {
            background-color: #088178;
            color: #fff;
        }

        #prodetails .single-pro-details span {
            line-height: 25px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-transparent border-0 text-dark">
                    <h2 class="card-title h3">Products {{str()->title($product->name)}}</h2>

                    <section id="prodetails" class="section-p1">
                        <div class="single-pro-image">
                            <img src="{{ asset('/uploads/images/' . $product->image->filename) }}" width="100%" id="MainImg" alt="">
                
                            <div class="small-image-group">
                                @foreach ($product->imageProducts()->get(['filename']) as $photo)
                                    <div class="small-image-col" class="small-img">
                                        <img onclick="changeImage(this.src)" src="{{ asset('/uploads/images/' . $photo->filename) }}" alt="" width="100%">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                
                        <div class="single-pro-details">
                            <h4>{{str()->title($product->name)}}</h4>
                            <h2>Rp.{{number_format($product->price, 0, ',', '.')}}</h2>
                            <h4>Product Details</h4>
                            <span>
                                {!! $product->description !!}
                            </span>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function changeImage(src) {
            document.getElementById('MainImg').src = src;
        }
    </script>
@endsection