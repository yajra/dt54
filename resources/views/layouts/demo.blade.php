<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @section('title')
    <title>{{ ($title ?? 'Demo') . ' | '. config('app.name', 'Laravel') }}</title>
    @show

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/sunburst.min.css">

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')

        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <ul class="menu">
                        @yield('side-menu')
                    </ul>
                </div>
                <div class="col-sm-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @stack('scripts')
    <script>
        $(function(){
            $('#js-container').html('&lt;script&gt;' + $('#script').html() + '&lt;/script&gt;');
        });
    </script>
</body>
</html>
