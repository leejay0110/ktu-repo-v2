@extends('layouts.admin')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li>Dashboard</li>
        </ul>
    </nav>

@endsection


@section('content')
    
    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="grid lg:grid-cols-3 gap-6">


            <div class="font-semibold bg-gray-100 rounded-lg p-6">

                
                <a href="{{ route('admin.notifications') }}" class="flex items-center hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline rounded-full mb-3">
                    <span class="flex items-center justify-center text-white bg-blue-600 rounded-full w-10 h-10 mr-3">
                        <i class="fas fa-bell"></i>
                    </span>
                    Notifications
                </a>

                <a href="{{ route('admin.users') }}" class="flex items-center hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline rounded-full mb-3">
                    <span class="flex items-center justify-center text-white bg-blue-600 rounded-full w-10 h-10 mr-3">
                        <i class="fas fa-users"></i>
                    </span>
                    Manage Users
                </a>

                <a href="{{ route('admin.profile') }}" class="flex items-center hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline rounded-full">
                    <span class="flex items-center justify-center text-white bg-blue-600 rounded-full w-10 h-10 mr-3">
                        <i class="fas fa-user"></i>
                    </span>
                    Profile
                </a>
                

            </div>

            <div class="lg:col-span-2">

                <div class="grid lg:grid-cols-3 gap-6">
            
        
                    <div class="bg-gray-100 text-center rounded-lg p-6">
                
                        <h1 class="text-6xl leading-none text-gray-900 mb-3">{{ $users }}</h1>
                        <span class="font-semibold">Registred Users</span>
                
                    </div>
            
                    <div class="bg-gray-100 text-center rounded-lg p-6">
                
                        <h1 class="text-6xl leading-none text-gray-900 mb-3">{{ $deactivated }}</h1>
                        <span class="font-semibold text-red-600">Deactivated Users</span>
                
                    </div>
            
                    <div class="bg-gray-100 text-center rounded-lg p-6">
                
                        <h1 class="text-6xl leading-none text-gray-900 mb-3">{{ $unapproved }}</h1>
                        <span class="font-semibold text-yellow-600">New Users</span>
                
                    </div>
            
                </div>

            </div>

        </div>


    </div>




@endsection