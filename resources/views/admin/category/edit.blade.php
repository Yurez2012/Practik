@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="text-center">Edit Category</h1>

        <hr />

        {!! Form::model($category, ['method' => 'PATCH', 'route' => ['auth.admin.category.update', $category->id]]) !!}


        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::text('category', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Update Category', ['class' => 'btn btn-primary submit-reg']) !!}

        {!! Form::close() !!}

        <hr />

        @include('errors.error_form')

    </div>



@stop

