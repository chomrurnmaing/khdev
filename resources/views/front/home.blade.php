@extends('layouts.master_frontend')

@section('contain')
    <section class="our-services">
        <div class="container">
            <div class="heading text-center">
                <h3>Our Services</h3>
                <hr>
            </div>
            <div class="services-slider">
                @foreach($services as $service)
                <div class="slider-item text-center">
                    <a href="{{ route('front.solutions.show', $service->id) }}">
                        <div class="icon text-center d-flex justify-content-center">
                            <img class="align-self-center" width="40" src="{{ $service->icon->getImageUrl() }}" alt="">
                        </div>
                    </a>
                    <a href="{{ route('front.solutions.show', $service->id) }}"><h4 class="title">{{ $service->title }}</h4></a>
                    <hr>
                    <p>{{ $service->except }}</p>
                </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('front.solutions.index') }}" class="btn btn-primary find-more">Find More</a>
            </div>

        </div>
    </section>

    <section class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="/frontend/images/our-team.jpeg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <div class="title">
                        <h4>We are a young talented in cambodia</h4>
                        <hr class="ml-0">
                    </div>
                    <div class="content">
                        <p><span>We are here to </span>Help you stay or be successful in the world of digital transformation. We see digital transformation as the integration of digital technology into all areas of a business resulting in fundamental changes to how businesses operate and how they deliver value to customers. We are passionate about digital technology and strongly believe we can make a difference by realizing IT solutions that deliver value to your business.</p>
                        <h5></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio">
        <div class="container">
            <div class="heading text-center">
                <h3>Our Portfolio</h3>
                <hr>
            </div>

            <ul class="cat-filter text-center">
                <li><a href="#" data-filter="*" class="active">All</a></li>
                @foreach($categories as $key => $category)
                    <li><a href="#" data-filter=".{{ $category->slug }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>

            <div class="grid">
                @foreach($portfolios as $portfolio)
                    <div class="element-item col-md-4 {{ $portfolio->all_categories }}" data-category="transition">
                        <div class="thumbnail d-flex justify-content-center">
                            <a href="{{ route('front.portfolios.show', $portfolio->id) }}">
                                <img src="{{ $portfolio->featuredImage->getImageUrl() }}" alt="" class="img-fluid">
                                <div class="title align-self-center">
                                    <h5>{{ $portfolio->title }}</h5>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                <a href="{{ route('front.portfolios.index') }}" class="btn btn-primary find-more">Find More</a>
            </div>

        </div>
    </section>

    <section class="our-team bg-gray">
        <div class="container">
            <div class="heading text-center">
                <h3>Meet Our Team</h3>
                <hr>
            </div>

            <div class="row justify-content-center">

                @foreach($teams as $key => $value)
                    <div class="col-md-3 col-sm-6">
                        <div class="team-profile">
                            <img src="{{ $value->avatar->getImageUrl() }}" alt="" class="img-fluid">

                            <div class="team-info text-center">
                                <h4>{{ $value->full_name }}</h4>
                                <p class="position">{{ $value->position->name }}</p>
                                <ul class="social-profile">
                                    @if($value->facebook != '')
                                        <li class="facebook"><a href="{{ $value->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if($value->linkedin != '')
                                        <li class="linkedin"><a href="{{ $value->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    @endif
                                    @if($value->gmail != '')
                                        <li class="google-plus"><a href="{{ $value->gmail }}"><i class="far fa-envelope"></i></a></li>
                                    @endif
                                    @if($value->twitter != '')
                                            <li class="twitter"><a href="{{ $value->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="company-logo">
        <div class="container">
            <div class="heading text-center">
                <h3>Our Partner</h3>
                <hr>
            </div>

            <div class="logo-slider">
                @foreach($partners as $key => $value)
                    @if($value->logo != null)
                        <div class="slider-item align-items-center">
                            <img class="img-fluid" src="{{ $value->logo->getImageUrl() }}" alt="">
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>

    <section class="company-logo mt-5 bg-gray">
        <div class="container">
            <div class="heading text-center">
                <h3>Our Clients</h3>
                <hr>
            </div>

            <div class="logo-slider">

                @foreach($clients as $key => $value)
                    @if($value->logo != null)
                        <div class="slider-item align-items-center">
                            <img class="img-fluid" src="{{ $value->logo->getImageUrl() }}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>

        </div>
    </section>
@endsection