@extends('layouts.app')


@section('content')

    <h1>News</h1>

    <ul>
        @foreach($news as $item)
            <li>{{ $item->id }}</li> <br>
            <li>{{ $item->title }}</li> <br>
            <li>{{ $item->category }}</li> <br>
            <li>{{ $item->text }}</li> <br>
            <li>{{ $item->img }}</li> <br>
            <hr>
        @endforeach

    </ul>

@stop