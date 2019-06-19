<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KHDev - Best IT Solutions</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @yield('extra_head')
</head>
<body>

<div id="pageloader" class="position-fixed">
    <div class="loader-item text-center">
        <img src="/frontend/images/loader.svg" alt="loader" />
    </div>
</div>

@include('partials._front_header')

<div class="main-contain">
    @if(\Request::is('/'))
        <section class="hero-slider">
            <div class="hero-slick-slider">
                @foreach($sliders as $key => $value)
                    <div class="slider-item text-center d-flex" style="background-image: url({{ $value->media->guid }}) ">
                        <div class="bg-overlay"></div>

                        <div class="hero-content align-self-center">
                            <div class="title animated fadeInDown">
                                <h2>{{ $value->title }}</h2>
                            </div>
                            <p class="animated fadeInUp delay-1s">{{ $value->except }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @else
        <section class="hero">
            <div class="hero-bg" data-image="{{ $page->media != null ? $page->media->getImageUrl() : '/frontend/images/solu-detail01.jpeg' }}">
                <div class="bg-hero-overlay"></div>
                <div class="container">
                    <div class="row align-items-center hero-heading">
                        <div class="col-md-6">
                            <h1>{{ isset($data_title) ? $data_title : $page->title }}</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('front.homepage') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @yield('contain')

    @if(!Request::is('/'))
        <section class="company-logo mt-5 bg-gray">
            <div class="container">
                <div class="heading text-center">
                    <h3>Our Clients</h3>
                    <hr>
                </div>

                <div class="logo-slider">
                    <div class="slider-item align-items-center">
                        <img class="img-fluid" src="/frontend/images/company-logos/company-logo-1.png" alt="">
                    </div>
                    <div class="slider-item align-items-center">
                        <img class="img-fluid" src="/frontend/images/company-logos/company-logo-2.png" alt="">
                    </div>
                    <div class="slider-item align-items-center">
                        <img class="img-fluid" src="/frontend/images/company-logos/company-logo-3.png" alt="">
                    </div>
                    <div class="slider-item align-items-center">
                        <img class="img-fluid" src="/frontend/images/company-logos/company-logo-4.png" alt="">
                    </div>
                    <div class="slider-item align-items-center">
                        <img class="img-fluid" src="/frontend/images/company-logos/company-logo-5.png" alt="">
                    </div>
                    <div class="slider-item align-items-center">
                        <img class="img-fluid" src="/frontend/images/company-logos/company-logo-6.png" alt="">
                    </div>
                </div>

            </div>
    </section>
    @endif
</div>

<footer class="text-center">
    <div class="top-footer">
        <div class="container">
            <img class="mb-3" src="/frontend/images/logo.png" alt="">
            <p>gathers knowledge from experienced people, professors, students who love to share to other with various sections and skills. This site will provide unlimited knowledge to those who love to expand their knowledge.</p>
            <div class="info">
                <ul>
                    <li><i class="fas fa-envelope"></i> info@khdev.com</li>
                    <li><i class="fas fa-phone-square"></i> 077 444 082</li>
                </ul>
                <p><i class="fas fa-map-marked-alt"></i>&ensp;St. 163, Khan Chamkarmorn, Sangkat Olympic, Phnom Penh, Cambodia</p>
                <ul class="footer-social-profiles">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <p>Copyright @ 2018 KHDEV. All rights reserved.</p>
        </div>
    </div>

</footer>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{ asset('frontend/js/jquery-3.2.1.slim.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>


<script src="{{ asset('frontend/plugin/slick/slick.min.js') }}"></script>
<script src="{{ asset('frontend/plugin/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/plugin/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/plugin/parallax.min.js') }}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('frontend/js/fontawesome/all.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('frontend/js/script.js') }}"></script>
@yield('extra_footer')
</body>
</html>