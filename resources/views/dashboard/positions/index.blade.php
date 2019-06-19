@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <form action="{{ route('admin.positions.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New</h3>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter position name.">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter position description."></textarea>
                        </div>

                    </div>

                    <div class="box-footer">
                        <div class="btn-group pull-right">
                            <button type="submit" class="btn btn-primary">{{ trans('general.button.save') }}</button>
                            <a href="#" class="btn btn-warning">{{ trans('general.button.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Positions</h3>
                </div>

                <div class="box-body">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->description }}</td>
                                    <td>
                                        <a href="#" title="{{ trans('general.button.edit') }}"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.positions.deleteModal', $value->id) }}" data-toggle="modal" data-target="#modal_dialog" title="{{ trans('general.button.delete') }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_footer')

@endsection
