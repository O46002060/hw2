<html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Chango&family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
        <link rel='stylesheet' href=@yield('css')>
        @yield('script')
</head>
<body>


<header>
@section('header')

<nav>
@section('links2')


                 @show          
<div id='logo'>
<h1>@yield('testo') @yield('username')</h1>
</div>

@section('links')

@show
</nav>
<div id='overlay'></div>
<h1>Your surgeon</h1>
@show
</header>


<section>
@section('contenuti')

@show
</section>
<footer id='footer'>
            <address>Di Bella Danilo O46002060</address>
            <p>Progetto di Web Programming A.A. 2020/2021</p>
        </footer>
</body>
</html>

