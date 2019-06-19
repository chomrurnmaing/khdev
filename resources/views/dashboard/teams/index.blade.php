@extends('layouts.master_backend')

@section('extra_header')

@endsection

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Teams</h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">

            <div class="btn-group header-add-button">
                <a class="btn btn-block btn-primary btn-flat" href="{{ route('admin.teams.create') }}"><i class="fa fa-plus"></i> <span class="hide-on-mobile">{{ trans('general.button.add-new') }}</span></a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Full Name</th>
                        <th>Position</th>
                        <th style="width: 40px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->full_name }}</td>
                            <td>{{ $value->position->name }}</td>
                            <td>
                                <a href="#" title="{{ trans('general.button.edit') }}"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('admin.teams.deleteModal', $value->id) }}" data-toggle="modal" data-target="#modal_dialog" title="{{ trans('general.button.delete') }}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

@section('extra_footer')

@endsection
