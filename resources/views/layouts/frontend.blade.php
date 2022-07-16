<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/atmostfer/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Atmostfeer - @yield('title')</title>
    @yield('css')
</head>

<body>

    <section id="header">
        <a href="/"><img src="{{ asset('/assets/img/atmostfer/img/logo.png') }}" class="logo"
                alt=""></a>

        <div>
            <ul id="navbar">
                @include('_partials.menus_frontend')
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="fa fa-shopping-bag"></i></a>
            <i id="bar" class="fa fa-outdent"></i>
        </div>
    </section>

    @yield('content')

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="{{ asset('/assets/img/atmostfer/img/logo.png') }}" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong> SCBD, 69, South Jakarta</p>
            <p><strong>Phone:</strong> 14022</p>
            <p><strong>Hours</strong> 10:00 - 17:00, Monday - Saturday</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="iocn">
                    <i class="fa fa-facebook-f"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-pinterest-p"></i>
                    <i class="fa fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Term & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="{{ asset('/assets/img/atmostfer/img/pay/app.jpg') }}" alt="">
                <img src="{{ asset('/assets/img/atmostfer/img/pay/play.jpg') }}" alt="">
            </div>
            <p>Secured Payment Gateaways</p>
            <img src="{{ asset('/assets/img/atmostfer/img/pay/pay.png') }}" alt="">
        </div>

        <div class="copyright">
            <p>© GultixXx</p>
        </div>
    </footer>


    <script src="{{ asset('/assets/js/atmostfer/script.js') }}"></script>
    @yield('script')
</body>

</html>
