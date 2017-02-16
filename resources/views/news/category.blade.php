@extends('layouts.app')


@section('content')


    <!-- First Blog Post -->
    @foreach($news as $item)
        <div class="container-fluid news">
            <h3>
                <a class="title" href="{{ URL('/news/'.$item->id) }}">{{ $item->title }}</a>
            </h3>
            <div class="row">
                <div class="col-md-6">
                    <img class="img" width="100%" height="240px" src="{!! URL::asset("assets/image/".$item->img) !!}" alt="{{ $item->img }}">
                </div>
                <div class="col-md-6">
                    <p class="lead">
                        Category: <span>{{ $item->category }}</span>
                    </p>
                    <p class="text-content text-justify">
                        {{ mb_substr($item->text, 0, 395) }} . . . </p>
                </div>
            </div>
            <div class="row button">
                <div class="col-md-6">
                    <p>
                        <span class="glyphicon glyphicon-time"></span> {!! date("j F", strtotime($item->date_to_add)) !!}&nbsp;&nbsp;
                        <i class="glyphicon fa fa-eye fa" aria-hidden="true"></i>&nbsp;{!! $item->show !!}
                    </p>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn read-button" href="{{ URL('/news/'.$item->id) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Pager -->
    <div class="row">
        <div class="col-md-12 text-center">
            {!! $news->render() !!}
        </div>
    </div>


@stop