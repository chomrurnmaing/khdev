@extends('layouts.master_frontend')

@section('contain')
    <section class="detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ $portfolio->featuredImage->getImageUrl('540x350') }}" alt="">
                </div>
                <div class="col-md-6 content-detail">

                    <div class="left-heading">
                        <h3>{{ $portfolio->title }}</h3>
                        <hr>
                    </div>

                    {!! $portfolio->content !!}

                    <table>
                        <tr>
                            <td style="width: 70px">Date:</td>
                            <td>{{ $portfolio->date }}</td>
                        </tr>
                        <tr>
                            <td>Skills:</td>
                            <td>{{ $portfolio->all_skills }}</td>
                        </tr>
                        <tr>
                            <td>Client:</td>
                            <td>{{ $portfolio->client_id }}</td>
                        </tr>
                    </table>

                    <h5>Share this project</h5>

                    <ul class="social-share">
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-google-plus-square"></i> Google Plus</a></li>
                        <li><a href="#"><i class="fab fa-twitter-square"></i> Twitter</a></li>
                    </ul>

                    <div class="get-app">
                        <a href="#"><img src="/frontend/images/app-store.png" alt=""></a>
                        <a href="#"><img src="/frontend/images/google-play.png" alt=""></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @if($portfolio->gallery->count() > 0)
        <section class="gallery">
            <div class="container">
                <div class="heading text-center">
                    <h3>Gallery</h3>
                    <hr>
                </div>

                <div class="row">
                    @foreach( $portfolio->gallery as $image )
                        <div class="col-md-4">
                            <div class="thumbnail">

                                <a href="{{ $image->getImageUrl() }}" class="popup-view">
                                    <img src="{{ $image->getImageUrl('540x350') }}" alt="">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection