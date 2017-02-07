@extends('layouts.from_news')


@section('content')


    <h1 class="page-header">
        Name: {{ $news->title }}
    </h1>

    <!-- First Blog Post -->

        <p class="lead">
            Category: <a href="index.php">{{ $news->category }}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted: {{ $news->updated_at }}</p>
        <br>
        <p>{{ $news->text }}</p>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="{{ $news->img }}">


@stop