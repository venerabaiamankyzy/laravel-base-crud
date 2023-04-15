<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ env('APP_NAME') }} - @yield('page-name')</title>

  {{-- BS icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  {{-- Includiamo gli assets con la direttiva @vite --}}
  @vite('resources/js/app.js')
</head>
<body>
  @include('partials._header')
  <main>
    <div class="container my-4">
       <h1>@yield('page-name')</h1>
        @yield('main-content')
    </div>
   
  </main>

  @include('partials._footer')

</body>
</html>