@extends('layouts.frontend')
@section('title', 'Home')

@section('content')
    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button>Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="{{ asset('/assets/img/atmostfer/') }}/img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('/assets/img/atmostfer/') }}/img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('/assets/img/atmostfer/') }}/img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('/assets/img/atmostfer/') }}/img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('/assets/img/atmostfer/') }}/img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="{{ asset('/assets/img/atmostfer/') }}/img/features/f6.png" alt="">
            <h6>Support</h6>
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p> Summer Collection New Morden Design</p>
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

    <section id="banner" class="section-p1">
        <h4>Repair Service</h4>
        <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>Spring/Summer 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>
@endsection
