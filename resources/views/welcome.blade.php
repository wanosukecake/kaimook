<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('/js/libraries/jquery-3.6.0.js') }}"></script>
        <script src="{{ asset('/js/libraries/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('/js/libraries/bootstrap.min.js') }}"></script>

        <title>Laravel</title>

    </head>
    <body>

    <div id="app" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    <example-component></example-component>
    <div class="grid grid-cols-1 md:grid-cols-2">    
    <div id="app1"></div>
    <script src="{{ mix('/js/app.js') }}"></script>
    
    </body>
</html>