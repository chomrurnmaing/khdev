@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $portfolio->title }}" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Enter content">{!! $portfolio->conent !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control" id="date" name="date" value="{{ $portfolio->date }}" placeholder="Pickup date">
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <select name="skills[]" id="skills" class="form-control" multiple="multiple">
                                @foreach( $skills as $key => $value )
                                    <option value="{{ $value->id }}"
                                            @foreach($portfolio->skills as $skill)
                                                @if($skill->id == $value->id)
                                                    selected
                                                @endif
                                            @endforeach
                                    >{{ $value->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="">
                        <div class="form-group">
                            <label for="galleries">Gallery</label>
                            <input type="file" class="form-control" id="galleries" name="galleries[]" placeholder="Upload gallery" multiple>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="featured-image">Featured Image</label>
                            <input type="file" class="form-control" id="featured-image" name="featured_image" placeholder="Upload a photo">
                        </div>
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select name="categories[]" id="categories" class="form-control" multiple="multiple">
                                @foreach( $categories as $key => $value )
                                    <option value="{{ $value->id }}"
                                        @foreach($portfolio->categories as $category)
                                            @if($category->id == $value->id)
                                                selected
                                            @endif
                                        @endforeach
                                    >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="box">
                    <div class="box-body">
                        <div class="btn-group">
                            <button type="submit" class="btn bg-olive btn-flat">{{ trans('general.button.save') }}</button>
                            <a href="{{ route('admin.portfolios.index') }}" class="btn bg-orange btn-flat">{{ trans('general.button.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </form>
@endsection

@section('extra_footer')
    <script>
        $( '#content' ).wysihtml5();
        $( '#date' ).datepicker();
        $( '#skills' ).select2();
        $( '#client' ).select2();
        $( '#categories' ).select2();
    </script>
@endsection
