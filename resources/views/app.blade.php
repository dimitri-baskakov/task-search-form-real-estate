<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task-search-form-real-estate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        <!-- <script src="/js/app.js"></script> -->
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
