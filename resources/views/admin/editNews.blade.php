@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Edit news</h1>

        <hr />

            {!! Form::model($news, array('enctype' => 'multipart/form-data', 'url' => 'auth/admin/news/update/'.$news->id, $news->id) )  !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('text', 'Text') !!}
                    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('img', ['class' => 'form-control-file']) !!}
                </div>

                {!! Form::submit('Update News', ['class' => 'btn btn-primary submit-reg']) !!}

            {!! Form::close() !!}

            <hr />

            @include('errors.error_form')

    </div>

@stop

