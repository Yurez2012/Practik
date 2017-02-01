@extends('layouts.app_no_head')

@section('content')

    <h1 class="text-center">Registration new user</h1>
    <hr />

    <div class="container reg center-block">
        {!! Form::open(['action' => 'Auth\AuthController@postRegister']) !!}

        {!! Form::token() !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', 'Name', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email', 'E-mail', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'PasswordConfirmed') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Registration', ['class' => 'btn btn-primary submit-reg']) !!}

        {!! Form::close() !!}

        <hr />

        @include('errors.error_form')

    </div>



@stop


