<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body>

    <h1>{{ $title }}</h1>

    <a href="<?php echo url('/'); ?>">Welcome</a>
    <br>
    <a href="<?php echo route('named.route'); ?>">Named Route</a>
    <br>
    <a href="<?php echo route('user.profile', ['id' => 1]); ?>">Named Route with Params</a>
    <br>
    <a href="<?php echo route('task.index'); ?>">Task Controller Index</a>

</body>
</html>
