@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Add news</h1>

        <hr />

            {!! Form::open(['url' => 'auth/admin/news', 'enctype' => 'multipart/form-data']) !!}

           {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', 'Title', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="sel1">Category</label>
                <select name="category" class="form-control" id="sel1">
                    @foreach($category as $item)
                        <option>{{ $item->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('text', 'Text') !!}
                {!! Form::textarea('text', 'Text', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('img', ['class' => 'form-control-file']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('date_to_add', 'Date') !!}
                {!! Form::date('date_to_add', Carbon\Carbon::now(), ['class' => 'date form-control']) !!}
            </div>

            {!! Form::submit('Add News', ['class' => 'btn btn-primary submit-reg']) !!}

            {!! Form::close() !!}

            <hr />

            @include('errors.error_form')

    </div>



@stop

