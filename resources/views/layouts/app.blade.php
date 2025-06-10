<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--    #17--}}
    @stack('styles')
    @stack('scripts')
</head>
<body>
    <header>Header</header>

    {{--    #9--}}
    @include('partials.nav')

    <main>
        {{--        #5--}}
        @yield('content')

        {{--        #8--}}
        @yield('scripts')
    </main>

    <footer>Footer here</footer>
</body>
</html>

