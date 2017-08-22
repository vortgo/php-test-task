<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Laravel</title>

    <link href="{{mix('css/all.css')}}" rel="stylesheet">
</head>
<body>

<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Reservation places system</a>
        </div>
    </div>
</div>

<div class="container">
    @include('flash::message')
    @yield('content')
</div><!-- /.container -->
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
<script src="{{mix('js/all.js')}}"></script>
</body>
</html>
