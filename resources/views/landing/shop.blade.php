@extends('layouts.frontend')
@section('title', 'Shop')

@section('content')
    <section id="page-header">
        <h2>#StayAtHome</h2>
        <p>Save more with coupons & up to 70% off!</p>
    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            @foreach ($productLists as $product)
                @php
                    $name = str()->title($product->name);
                    $desc = str()->limit($product->description, 100);
                    $price = number_format($product->price, 0, ',', '.');
                    $image = asset('uploads/images/' . $product->image?->filename);
                    $merk = str()->title($product->merk->name);
                @endphp
                <div class="pro">
                    <img src="{{ $image }}" alt="{{$name}}">
                    <div class="des">
                        <span>{{$merk}}</span>
                        <h5>{{$name}}</h5>
                        <div class="star">
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                        </div>
                        <h4>Rp.{{$price}}</h4>
                    </div>
                    <a href="#"><i class="fa fa-shopping-cart cart"></i></a>
                </div>
            @endforeach
        </div>
    </section>

    <section id="pagination" class="section-p1">
        {{$productLists->links()}}
    </section>

@endsection
