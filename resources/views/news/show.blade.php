@extends('layouts.from_news')


@section('content')


    <div class="container news">

        <h3 class="col-md-12">
            {{ $news->title }}
        </h3>
        <div class="col-md-4">
            <img class="img" width="100%" src="{!! URL::asset("assets/image/".$news->img) !!}" alt="{{ $news->img }}">
        </div>
        <div class="col-md-8">
            <p class="lead">
                Category: <span>{{ $news->category }}</span>
            </p>
            <p class="text-content">
                    {!! nl2br($news->text) !!}
            </p>
        </div>
        <div class="row button">
            <div class="col-md-6">
                <p>
                    <span class="glyphicon glyphicon-time"></span>Posted: {!!  date("j F", strtotime($news->date_to_add)) !!}
                </p>
            </div>
            <div class="col-md-6 text-right">
                <p>
                    <i class="glyphicon fa fa-eye fa" aria-hidden="true"></i>&nbsp;{!! $news->show !!}
                </p>
            </div>
        </div>
    </div>

@stop