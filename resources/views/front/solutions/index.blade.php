@extends('layouts.master_frontend')

@section('contain')
    <section class="our-services mb-60">
        <div class="container">
            <div class="row">

                @foreach($services as $service)
                    <div class="col-md-4 text-center">
                        <div class="solution-item shadow-sm">
                            @if($service->icon != null)
                                <a href="#">
                                    <div class="icon text-center d-flex justify-content-center">
                                        <img class="align-self-center" width="40" src="{{ $service->icon->getImageUrl() }}" alt="">
                                    </div>
                                </a>
                            @endif
                            <a href="{{ route('front.solutions.show', $service->id) }}"><h4 class="title">{{ $service->title }}</h4></a>
                            <hr>
                            <p>{{ $service->except }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection