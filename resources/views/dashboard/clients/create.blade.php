@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                </div>

                <div class="form-group">
                    <label for="media">Logo</label>
                    <input type="file" class="form-control" id="media" name="media" placeholder="Upload a photo">
                </div>

                <div class="box-footer">
                    <div class="btn-group">
                        <button type="submit" class="btn bg-olive btn-flat">{{ trans('general.button.save') }}</button>
                        <a href="{{ route('admin.clients.index') }}" class="btn bg-orange btn-flat">{{ trans('general.button.cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
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
