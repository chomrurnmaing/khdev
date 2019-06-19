@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-control" name="position_id" id="position">
                                <option value="">Select a position.</option>
                                @foreach($positions as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <hr>
                        <h4>Social Profiles</h4>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-facebook"></i></div>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook url">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-linkedin"></i></div>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin url">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="text" class="form-control" id="gmail" name="gmail" placeholder="Enter Gmail">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter Twitter URL">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="avatar-image">Avatar Image</label>
                            <input type="file" class="form-control" id="avatar-image" name="avatar_id" placeholder="Upload a photo">
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-body">
                        <div class="btn-group">
                            <button type="submit" class="btn bg-olive btn-flat">{{ trans('general.button.save') }}</button>
                            <a href="{{ route('admin.teams.index') }}" class="btn bg-orange btn-flat">{{ trans('general.button.cancel') }}</a>
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
