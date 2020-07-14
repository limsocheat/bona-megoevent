<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @include('layouts.styles')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app">
        <div class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        @include('layouts.partials.logo')
                    </div>
                    <div class="col-md-8">
                        @include('layouts.partials.top_navigation')
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.partials.main_navigation')

        @if(!Request::is('/'))
        @include('layouts.partials.breadcrumb')
        @endif

        <main>
            @yield('content')
        </main>

        @include('layouts.partials.about')
        @include('layouts.footer')
    </div>
    @include('layouts.scripts')
</body>

</html>