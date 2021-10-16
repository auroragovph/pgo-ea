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

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="empty">
          <div class="empty-header">@yield('error-code')</div>
          <p class="empty-title">@yield('error-title')</p>

          <p class="empty-subtitle text-muted">
            @yield('error-message')
          </p>


          <div class="empty-action">
            @yield('error-action')
          </div>

        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    @include('layouts.includes.scripts')

  </body>

</html>
