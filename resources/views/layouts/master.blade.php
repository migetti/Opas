<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default title')</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    {!! HTML::style('css/style.css') !!}
</head>
<body>
	{!! HTML::link('/auth/logout', 'LOGOUT', ['class' => 'logout']) !!}
<div class="nav">
    @yield('links')
</div>
<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>