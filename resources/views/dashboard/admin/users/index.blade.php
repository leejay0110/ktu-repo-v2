@extends('layouts.admin')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li>Users</li>
        </ul>
    </nav>

@endsection


@section('content')


    <div id="app-content" class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="grid lg:grid-cols-4 gap-6">

            <div>
                <h1 class="text-lg font-semibold">Users</h1>
                <p>Manage user accounts</p>
            </div>
    

            <div class="lg:col-span-3">

                @if ( $users->count() )
                    
                    <div class="w-full bg-gray-100 rounded-lg p-6">
        
                        
                        <table class="table-auto border-collapse w-full">
        
                            <thead>
                                <tr class="font-semibold text-blue-600 text-left">
                                    <th class="p-4 text-left">User</th>
                                    <th class="p-4">Created</th>
                                    <th class="p-4">Status</th>
                                </tr>
                            </thead>
                            
                            <tbody class="">
        
                                @forelse ($users as $user)
                                    <tr class="hover:bg-gray-200 border-t border-gray-300">
                                        <td class="p-4 text-left">
                                            {{ $user->name }} ~ 
                                            <a class="text-blue-600 font-semibold" href="{{ route('admin.users.show', $user) }}">{{ $user->email }}</a>
                                        </td>
                                        <td class="p-4">{{ $user->created_at->isoFormat('lll') }}</td>
                                        <td class="p-4">
                                            @if ( $user->isActive() )
                                            <span class="text-green-600 font-semibold"><i class="fas fa-check-circle"></i> Active</span>
                                            @else
                                            <span class="text-red-600 font-semibold"><i class="fas fa-times-circle"></i> Deactived</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
        
                            </tbody>
                        </table>
        
        
                    </div>
        
                @else
        
                
                    <div class="text-center">
                    
                        <img src="{{ asset('svg/empty.svg') }}" alt="" class="inline-block w-64 mb-3">    

                        <p class="text-indigo-600 font-semibold">
                            <i class="fas fa-info-circle"></i>
                            No data found
                        </p>

                    </div>
                    
                    
                @endif

            </div>


        </div>


    </div>

@endsection