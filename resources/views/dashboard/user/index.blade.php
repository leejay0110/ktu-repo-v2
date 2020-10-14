@extends('layouts.user')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li>Dashboard</li>
        </ul>
    </nav>

@endsection


@section('content')


    @include('partials.flash')

    <div class="max-w-screen-lg mx-auto px-4 my-12">

        
        <div class="grid lg:grid-cols-3 gap-6">

            <div class="bg-gray-100 rounded-lg p-6">


                @if ( Auth::user()->roles->pluck('name')->contains('pep upload') )
                    
                    <a href="{{ route('user.papers') }}" class="flex items-center hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline rounded-full mb-3">
                        <span class="flex items-center justify-center text-white bg-blue-600 rounded-full w-10 h-10 mr-3">
                            <i class="fas fa-sticky-note"></i>
                        </span>
                        Manage Past Exam Papers
                    </a>

                @endif

                @if ( Auth::user()->roles->pluck('name')->contains('cm upload') )

                    <a href="{{ route('user.materials') }}" class="flex items-center hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline rounded-full mb-3">
                        <span class="flex items-center justify-center text-white bg-blue-600 rounded-full w-10 h-10 mr-3">
                            <i class="fas fa-book"></i>
                        </span>
                        Manage Course Materials
                    </a>

                @endif


                <a href="{{ route('user.profile') }}" class="flex items-center hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline rounded-full">
                    <span class="flex items-center justify-center text-white bg-blue-600 rounded-full w-10 h-10 mr-3">
                        <i class="fas fa-user"></i>
                    </span>
                    User Profile
                </a>

            </div>


            @if ( Auth::user()->roles->pluck('name')->contains('pep upload') )

                <div class="bg-gray-100 text-center rounded-lg">

                    <div class="p-6">

                        <h1 class="text-6xl leading-none text-gray-900 mb-3">{{ Auth::user()->papers->count() }}</h1>
                        <span class="font-semibold">Past Exam Papers</span>

                    </div>

                    <div class="bg-gray-200 text-right rounded-b-lg p-6">

                        <a
                        href="{{ route('user.papers.create') }}" 
                        class="bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline text-white inline-block rounded-lg font-semibold px-4 py-2"
                        >
                            <i class="fas fa-plus-circle"></i>
                            Add New
                        </a>

                    </div>

                </div>

            @endif


            @if ( Auth::user()->roles->pluck('name')->contains('cm upload') )

                <div class="bg-gray-100 text-center rounded-lg">

                    <div class="p-6">

                        <h1 class="text-6xl leading-none text-gray-900 mb-3">{{ Auth::user()->materials->count() }}</h1>
                        <span class="font-semibold">Course Materials</span>

                    </div>

                    

                    <div class="bg-gray-200 text-right rounded-b-lg p-6">

                        <a
                        href="{{ route('user.materials.create') }}" 
                        class="bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline text-white inline-block rounded-lg font-semibold px-4 py-2"
                        >
                            <i class="fas fa-plus-circle"></i>
                            Add New
                        </a>

                    </div>
                </div>

            @endif


        </div>


    </div>



@endsection