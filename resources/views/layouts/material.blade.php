<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} - Course Materials</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-400">
    

    @include('partials.navbar2')

    <div class="bg-blue-900 text-white">

        <div class="flex items-center justify-between max-w-screen-lg mx-auto p-4">

            <aside x-data="{ isOpen: false }">

                <button @click="isOpen = true" class="bg-white hover:bg-gray-300 text-blue-900 rounded-lg focus:outline-none focus:shadow-outline px-4 py-2 mr-6">
                    <i class="fas fa-align-left"></i>
                </button>

                <div x-show="isOpen" @click="isOpen = false" class="fixed top-0 left-0 w-full h-full bg-black opacity-50 cursor-pointer"></div>
                
                <div class="bg-white fixed top-0 left-0 w-5/6 max-w-sm h-full overflow-y-auto" x-show="isOpen">
                    <x-material-sidebar/>
                </div>

            </aside>
    
            <nav>
                @yield('navbar')
            </nav>

        </div>


    </div>

    <div id="app" class="min-h-screen">
        
        @yield('content')
        
    </div>


    @include('partials.footer')


    {{-- scripts here --}}
    @yield('scripts')
    <script src="{{ asset('js/alpine.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>