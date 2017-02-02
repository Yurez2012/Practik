@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    News
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
                            <th>title</th>
                            <th>category</th>
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
                                    <td>{{ substr($item->title, 0, 25) }}</td>
                                    <td>{{ substr($item->category, 0, 25) }}</td>
                                    <td>{{ substr($item->text, 0, 50) }}</td>
                                    <td>{{ substr($item->img, 27) }}</td>
                                    <td>{!! link_to('auth/admin/news/'.$item->id.'/edit', $title = 'Edit', ['class' => 'btn btn-primary submit-reg'], $attributes = [], $secure = []) !!}</td>
                                    <td>
                                        {!! Form::model($item, ['method' => 'DELETE', 'route' => ['auth.admin.news.destroy', $item->id]]) !!}
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