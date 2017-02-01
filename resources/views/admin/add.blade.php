@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Add news</h1>

        <hr />

            {!! Form::open(['url' => 'auth/admin/news/add', 'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', 'Title', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('text', 'Text') !!}
                {!! Form::textarea('text', 'Text', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('img', ['class' => 'form-control-file']) !!}
            </div>

            {!! Form::submit('Add News', ['class' => 'btn btn-primary submit-reg']) !!}

            {!! Form::close() !!}

            <hr />

            @include('errors.error_form')

    </div>



@stop

