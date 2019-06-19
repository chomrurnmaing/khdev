@extends('layouts.master_frontend')

@section('contain')
    <div class="service-overview mb-5">
        <div class="container">
            <div class="images">
                <div class="row">

                    @foreach($service->gallery as $image)
                        <div class="col-md-6">
                            <img class="img-fluid mb-3" src="{{ $image->getImageUrl('540x350') }}" alt="">
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="left-heading">
                <h3>SERVICE OVERVIEW</h3>
                <hr>
            </div>
            <div class="content">
                 {!! $service->content !!}
            </div>
        </div>
    </div>
    @if( $service->faqs->count() > 0 )
        <div class="faq">
            <div class="container">
                <div class="left-heading">
                    <h3>FREQUENTLY ASKED QUESTIONS</h3>
                    <hr>
                </div>
                <div class="accordion" id="accordionExample">

                    @foreach($service->faqs as $key => $value)
                        <div class="card">
                            <div class="card-header" id="heading-{{ $value->id }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $value->id }}" aria-expanded="true" aria-controls="collapse-{{ $value->id }}">
                                        {{ $value->questions }}
                                    </button>
                                </h2>
                            </div>

                            <div id="collapse-{{ $value->id }}" class="collapse" aria-labelledby="heading-{{ $value->id }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ $value->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
@endsection