<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- include boodstrap theme, style, js -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- end boodstrap -->
    <link rel="stylesheet" href={{ URL::asset('assets/css/style.css') }}>

    <title>Document</title>
</head>
<body>

    <div class="wrapper container-fluid">
        <header>
            <div class="text-right">
                @if(Auth::check())
                    <h3>
                        {!! link_to('auth/logout', $title = 'logout', $attributes = [], $secure = null) !!} |
                        {!! link_to('auth/admin', $title = 'admin', $attributes = [], $secure = null) !!} |
                        {!! link_to('/', $title = 'home', $attributes = [], $secure = null) !!} |
                    </h3>
                @endif

                @if(!Auth::check())
                    <h3>User | {!! link_to('auth/login', $title = 'Auth', $attributes = [], $secure = null) !!}</h3>
                @endif
            </div>
        </header>
        <div class="navbar">

        </div>
        <div class="content">
            @yield('content')
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>