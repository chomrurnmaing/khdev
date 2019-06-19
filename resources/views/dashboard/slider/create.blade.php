@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Slider</h3>
        </div>

        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="except">Except</label>
                    <textarea class="form-control" id="except" name="except" placeholder="Enter except"></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Enter content"></textarea>
                </div>
                <div class="form-group">
                    <label for="hero">Hero Photo</label>
                    <input type="file" class="form-control" name="media" placeholder="Upload a photo">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">{{ trans('general.button.save') }}</button>
                    <a href="#" class="btn btn-warning">{{ trans('general.button.cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('extra_footer')
    <script>
        $( '#content' ).wysihtml5();
    </script>
@endsection
