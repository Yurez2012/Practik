@extends('layouts.app')


@section('content')

@if($search == null)
    <h2>News not found</h2>
@endif
@if($search != null)
    @foreach($news as $item)
        <h2>
            <a href="{{ URL('/news/'.$item->id) }}">{{ $item->title }}</a>
        </h2>
        <h2>
            <a href="#"></a>
        </h2>
        <p class="lead">
            <a href="{{ URL('/news/'.$item->id) }}">{{ $item->category }}</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted {{ $item->updated_at }}</p>
        <img class="img-responsive" width="100%" src="{!! URL::asset("assets/image/".$item->img) !!}" alt="{{ $item->img }}">
        <p>{{ $item->text }}</p>
        <a class="btn btn-primary" href="{{ URL('/news/'.$item->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    @endforeach

    <!-- Pager -->
    {!! $news->render() !!}
@endif

@stop