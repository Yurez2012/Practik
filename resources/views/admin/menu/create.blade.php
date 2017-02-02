@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Add Menu</h1>

        <hr />

        {!! Form::open(['url' => 'auth/admin/menu']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Menu') !!}
            {!! Form::text('name', 'Name', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Add Menu', ['class' => 'btn btn-primary submit-reg']) !!}

        {!! Form::close() !!}

        <hr />

        @include('errors.error_form')

    </div>



@stop

