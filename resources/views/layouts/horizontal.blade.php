<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <title>Educational Assistance</title>

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />

    @include('layouts.includes.styles')
</head>

<body class="antialiased">
    <div class="wrapper">
        

        @include('layouts.includes.header')
    
        @auth
            @include('layouts.includes.navbar')
        @endauth


        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                @yield('page-pretitle')
                            </div>
                            <h2 class="page-title">
                                @yield('page-title')
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            @yield('page-action')
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    @include('layouts.includes.alerts')
                    @section('content')
                    @show
                </div>
            </div>
            @include('layouts.includes.footer')


        </div>
    </div>


    @include('layouts.includes.scripts')
</body>

</html>
