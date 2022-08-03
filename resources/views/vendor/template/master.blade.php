<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
        <link href="{{ URL::asset('content/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ URL::asset('content/vendor/fontawesome-6.1.2/css/all.min.css') }}" rel="stylesheet"/>
    </head>
    <body>
        @include('vendor.sections.header.menu')

        <div class="container">
            <div class="row">
                <div class="col-12">
                    @yield('content-breadcrumb')
                </div>

                @yield('content-body')
            </div>
        </div>

        @include('vendor.sections.footer.footer')

        <script src="{{ URL::asset('content/vendor/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ URL::asset('content/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
