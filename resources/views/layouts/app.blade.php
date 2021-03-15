<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title') – {{ config('app.name') }} </title>

  <link rel="shortcut icon" href="#" />
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @stack('styles')
</head>

<body>

  <div id="app" class="flex flex-col min-h-screen h-full">
    @include('partials.header')

    <div class="flex-1">
      @yield('content')
    </div>

    @include('partials.footer')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>

  @stack('scripts')
</body>

</html>
