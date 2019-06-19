@extends('layouts.master_backend')

@section('extra_header')
    <style>
        .upload-file{
            padding: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Media</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">

            <div class="box upload-file">
                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="media">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">{{ trans('general.button.upload') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                @foreach($data as $key => $value)
                    <div class="col-sm-2 col-xs-6">
                        <div class="box box-widget">
                            <img class="img-responsive" src="{!! $value->getImageUrl('300x300') !!}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('extra_footer')

@endsection
