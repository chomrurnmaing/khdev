@extends('layouts.master_backend')

@section('extra_header')
    <style>
        .section-group{
            padding: 15px;
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: #F5F5F5;
        }
    </style>
@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Pages</h3>
        </div>

        <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Enter content"></textarea>
                </div>
                <div class="form-group">
                    <label for="hero">Hero Photo</label>
                    <input type="file" class="form-control" name="media" placeholder="Upload a photo">
                </div>

                <hr>
                <h4>Page Sections</h4>

                <div id="section-repeater">
                    <button type="button" class="add-section btn btn-primary">Add Section</button>
                    <div class="section-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="section-title[]" placeholder="Enter section title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tagline</label>
                                    <input type="text" class="form-control" name="section-tagline[]" placeholder="Enter section tagline">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" name="section-content[]" placeholder="Enter section content"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="section-image[]" placeholder="Upload a section image.">
                                </div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="remove-section btn btn-danger">Remove</button>
                        </div>
                    </div>
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
    <script type="text/javascript" src="{{ asset('js/jquery.form-repeater.js') }}"></script>
    <script>
        $( '#content' ).wysihtml5();

        $('#section-repeater').repeater({
            btnAddClass: 'add-section',
            btnRemoveClass: 'remove-section',
            groupClass: 'section-group',
            minItems: 0,
            maxItems: 0,
            startingIndex: 0,
            showMinItemsOnLoad: true,
            reindexOnDelete: true,
            repeatMode: 'append',
            animation: 'fade',
            animationSpeed: 400,
            animationEasing: 'swing',
            clearValues: true
        });
    </script>
@endsection
