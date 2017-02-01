@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>News Update non work</strong>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <h2>Contextual Classes</h2>
                <div class="table-fluid">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>text</th>
                            <th>image</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ substr($item->text, 0, 25) }}</td>
                                    <td>{{ substr($item->text, 0, 50) }}</td>
                                    <td>{{ substr($item->img, 27) }}</td>
                                    <td>{!! link_to('auth/admin/news/'.$item->id.'/edit', $title = 'Edit', ['class' => 'btn btn-primary submit-reg'], $attributes = [], $secure = []) !!}</td>
                                    <td>
                                        {!! Form::open(['url' => 'auth/admin/news/delete/'.$item->id]) !!}

                                            {!! Form::submit('Delete', ['class' => 'btn btn-primary submit-reg']) !!}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

@stop