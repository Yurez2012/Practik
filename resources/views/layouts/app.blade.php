<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{!! $token !!}"/>

    <!-- include boodstrap theme, style, js -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href={{ URL::asset('assets/css/style.css') }}>
    <!-- Custom CSS -->
    <link href={{ URL::asset("assets/css/blog-home.css") }} rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL('/') }}">WEBLOG</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach($menu as $item)
                     <li>
                         <a href="{{ URL($item->url) }}">{{ $item->name }}</a>
                     </li>
                @endforeach
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container hr_footer">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            @yield('content')

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            @include('.news._form_search')

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @foreach($category as $item)
                                <li>
                                    <a href={{"/category/".$item->id }}>{{ $item->category }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            @if(Auth::check())

                                <li>
                                    <a href="{{ URL('/auth/admin/') }}">Admin panel</a>
                                </li>
                                <hr>
                                <li>
                                    <a href="{{ URL('/auth/admin/category/create') }}">New Category</a>
                                </li>
                                <li>
                                    <a href="{{ URL('/auth/admin/news/create') }}">New News</a>
                                </li>
                                <li>
                                    <a href="{{ URL('/auth/admin/menu/create') }}">New Menu</a>
                                </li>
                                <hr>
                                <li>
                                    <a href="{{ URL('auth/logout') }}">Logout</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; WEBLOG by Yurez 2017</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="{{ URL::asset("assets/js/jquery.js") }}"></script>
<script src="{{ URL::asset("assets/js/myjs.js") }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset("assets/js/bootstrap.min.js") }}"></script>

</body>
</html>