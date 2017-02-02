@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Menu
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <div id="messageBox" class="row">
            <div  class="col-lg-12">
                <div class="alert alert-info alert-dismissable">

                    <i class="fa fa-info-circle"></i>
                    <strong>
                        {{ session('newNews') }}
                    </strong>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>menu</th>
                        <th>edit</th>
                        <th>delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menu as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ substr($item->name, 0, 25) }}</td>
                            <td>{!! link_to('auth/admin/menu/'.$item->id.'/edit', $title = 'Edit', ['class' => 'btn btn-primary submit-reg'], $attributes = [], $secure = []) !!}</td>
                            <td>
                                {!! Form::model($item, ['method' => 'DELETE', 'route' => ['auth.admin.menu.destroy', $item->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-primary submit-reg']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

@stop