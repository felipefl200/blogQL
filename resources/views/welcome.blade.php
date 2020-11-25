<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
        <title>BlogQL</title>
    </head>
    <body class="bg-gray-200">
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
    <script src="{{mix('js/app.js')}}"></script>
</html>
