<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
        @include('layouts.frontend.partial.css')
    </head>
    <body>
        @include('layouts.frontend.partial.header')
        @yield('main_section')
        @include('layouts.frontend.partial.footer')
        @include('layouts.frontend.partial.js')
    </body>
</html>
