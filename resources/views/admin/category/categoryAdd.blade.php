@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Add Category</h1>

        <hr />

        {!! Form::open(['url' => 'auth/admin/category']) !!}

        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::text('category', 'Category', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Add Category', ['class' => 'btn btn-primary submit-reg']) !!}

        {!! Form::close() !!}

        <hr />

        @include('errors.error_form')

    </div>



@stop

