@extends('layouts.master_frontend')

@section('contain')
    <section class="portfolio">
        <div class="container">
            <ul class="cat-filter text-center">
                <li><a href="#" data-filter="*" class="active">All</a></li>
                @foreach($categories as $key => $category)
                    <li><a href="#" data-filter=".{{ $category->slug }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>

            <div class="grid">
                @foreach($portfolios as $key => $value)
                    <div class="element-item col-md-4 {{ $value->all_categories }}" data-category="transition">
                        <div class="thumbnail d-flex justify-content-center">
                            <a href="portfolio-detail.html">
                                <img src="{{ $value->featuredImage->getImageUrl('720x550') }}" alt="" class="img-fluid">
                                <div class="title align-self-center">
                                    <h5>{{ $value->title }}</h5>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection