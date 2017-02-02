@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Edit Menu</h1>

        <hr />

        {!! Form::model($menu, ['method' => 'PATCH', 'route' => ['auth.admin.menu.update', $menu->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Menu') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Update Menu', ['class' => 'btn btn-primary submit-reg']) !!}

        {!! Form::close() !!}

        <hr />

        @include('errors.error_form')

    </div>



@stop

