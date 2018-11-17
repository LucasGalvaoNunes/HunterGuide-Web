<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('layoutCss')
    <title>@yield('layoutTitle')</title>
</head>
<body @yield('layoutBodyParam')>

@yield('layoutContent')
<script src="{{asset('js/app.js')}}"></script>
@yield('layoutScript')
</body>
</html>