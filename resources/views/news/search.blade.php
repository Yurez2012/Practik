@extends('layouts.from_news')


@section('content')

    @include('.news._form_search')

@if($search == null)
     <h2>News not found</h2>
@endif

@if($search != null && $news != null)
    <!-- First Blog Post -->

    @include('.news._foreach_news')

@endif

@stop