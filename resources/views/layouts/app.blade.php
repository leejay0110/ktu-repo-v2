<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} @yield('app_title')</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
</head>
<body class="bg-gray-400">
    

    @include('partials.navbar2')

    <div class="min-h-screen">

        @yield('content')

    </div>

    @include('partials.footer')


    {{-- scripts here --}}
    @yield('scripts')
    <script src="{{ asset('js/alpine.min.js') }}"></script>

</body>
</html>