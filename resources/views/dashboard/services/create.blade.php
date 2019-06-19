@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="uploaded-photos" name="gallery" value="">
                <div class="box">
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
                            <label for="icon">Icon</label>
                            <input type="file" class="form-control" id="icon" name="icon" placeholder="Upload a photo">
                        </div>

                        <hr>
                        <h4>Frequently asked questions.</h4>

                        <div id="faq-repeater">
                            <button type="button" class="add-faq btn btn-primary">Add Question</button>
                            <div class="faq-group">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" class="form-control" name="faq-question[]" placeholder="Enter question.">
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="faq-answer[]" class="faq-answer form-control" placeholder="Enter answer"></textarea>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="remove-faq btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="btn-group">
                                <button type="submit" class="btn bg-olive btn-flat">{{ trans('general.button.save') }}</button>
                                <a href="{{ route('admin.services.index') }}" class="btn bg-orange btn-flat">{{ trans('general.button.cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form id="upload-gallery" method="post" action="{{ route('admin.media.api-store') }}" class="dropzone">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection

@section('extra_footer')
    <script type="text/javascript" src="{{ asset('js/jquery.form-repeater.js') }}"></script>

    <script>

        $( '#content' ).wysihtml5();

        $('#faq-repeater').repeater({
            btnAddClass: 'add-faq',
            btnRemoveClass: 'remove-faq',
            groupClass: 'faq-group',
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

        $( '.remove-faq' ).attr('style', 'display: block;');
        var uploaded = [];
        var uploader = new Dropzone(
            '#upload-gallery',
            {
                addRemoveLinks: true,
            }
        );

        uploader.on('success', function (file, response) {
            uploaded.push(response.data.id);
            $( '#uploaded-photos' ).val(uploaded);
        });

    </script>
@endsection
