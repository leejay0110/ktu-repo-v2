@extends('layouts.admin')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('admin.notifications') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Notifications</a></li>
            <li><span class="mx-2">/</span></li>
            <li>Notification Details</li>
        </ul>
    </nav>

@endsection


@section('content')

    <div class="max-w-screen-lg mx-auto px-4 py-12">

        <div class="w-5/6 lg:w-2/5 mx-auto bg-white shadow-sm rounded-lg">
            
            <div class="text-center text-white bg-blue-900 tracking-widest rounded-t-lg p-6">
                A NEW USER HAS REGISTERED
            </div>
    
            <div class="text-gray-800 text-center p-6">
    
                <i class="fas fa-user-circle text-6xl"></i>
                <p class="mt-3">
                    <span class="text-teal-600 font-semibold">John Lee</span>
                    registered 2 weeks ago.
                </p>
    
            </div>
    
            <hr>
    
            <div class="text-center p-6">

                <h1 class="font-semibold text-sm mb-3">ROLES</h1>
                

                <table class="table-auto border-collapse w-full">
                    <tbody>
                        <tr><td class="p-4 border-t">Past Examination Papper Upload</td></tr>
                        <tr><td class="p-4 border-t">Course Material Upload</td></tr>
                    </tbody>
                </table>

                {{-- <ul class="text-sm">
                    <li class="p-4 border border-l-0">Past Examination Papper Upload</li>
                    <li class="p-4 border border-l-0">Course Material Upload</li>
                </ul> --}}
    
            </div>
    
            <hr>
    
            <div class="text-center p-6">
                
                <p class="mb-3 text-blue-600 text-sm">The account has not yet been approved. Click on the button bellow to approve this account.</p>
    
                <button class="rounded-lg bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline font-semibold text-white px-4 py-2">
                    Approve Account
                </button>
    
            </div>
    
    
        </div>

    </div>


@endsection