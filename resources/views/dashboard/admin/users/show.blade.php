@extends('layouts.admin')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('admin.users') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Users</a></li>
            <li><span class="mx-2">/</span></li>
            <li>User Details</li>
        </ul>
    </nav>

@endsection


@section('content')

    @include('partials.flash')

    <div class="max-w-screen-lg mx-auto px-4 py-12">



        {{-- Account Approval --}}
        @if ( !$user->isApproved() )

            <div class="grid lg:grid-cols-3 gap-6">

                <div>
                    <h1 class="text-lg font-semibold">Account Approval</h1>
                    <p></p>
                </div>

                {{-- Approve Account --}}
                <div class="lg:col-span-2 bg-white rounded-lg">

                    <div class="text-center p-6">

                        <p class="text-blue-600 font-semibold">This account has not yet been approved. Please click on the button below to approve account.</p>

                    </div>


                    <form action="{{ route('admin.users.approve', $user) }}" method="post" class="bg-gray-200 rounded-b-lg text-right p-6">

                        @csrf
                        @method('put')

                        <button 
                            type="submit"
                            class="{{ $user->isActive() ? 'bg-green-600 hover:bg-green-700' : 'bg-green-600 hover:bg-green-700' }} focus:outline-none focus:shadow-outline font-semibold text-white rounded-lg px-4 py-2" 
                        >
                            Approve Account
                        </button>

                    </form>


                </div>

            </div>


            <hr class="border-gray-500 my-12">
            
        @endif



        {{-- User Details --}}
        <div class="grid lg:grid-cols-3 gap-6">
    
            <div>
                <h1 class="text-lg font-semibold">User Details</h1>
                <p>User details and account activation</p>
            </div>

            <div class="lg:col-span-2 bg-white rounded-lg">
                
                <div class="text-center p-6">
                    
                    @if ( $user->avatar )
                    
                        <div x-data="{ open: false }">
                            
                            <img src="{{ asset('/storage' . Str::after($user->avatar, 'public')) }}" alt="avatar" class="rounded-full cursor-pointer inline-block w-20 h-20 mb-3" @click="open = true">
    
    
                            {{-- image modal --}}
                            <div class="bg-black opacity-75 fixed left-0 bottom-0 w-full h-full" x-show="open"></div>
                            
                            <div
                                class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full cursor-pointer"
                                x-show="open" @click="open = false"
                            >
                                <div class="bg-gray-100 rounded-lg p-4">
                                    <img src="{{ asset('/storage' . Str::after($user->avatar, 'public')) }}" alt="avatar">
                                </div>
                            </div>

                        </div>


                    @else
                        <div class="flex items-center justify-around w-20 h-20 mx-auto rounded-full bg-blue-900 mb-3">
                            <p class="uppercase font-semibold text-4xl text-white">{{ Str::substr($user->name, 0, 1) }}</p>
                        </div>
                    @endif


                    <p class="font-semibold">
                        {{ $user->name }}
                        
                        @if ( $user->isApproved() )

                            <span class="block text-green-600">
                                Accout Approved
                                <i class="fas fa-certificate"></i>
                            </span>
                        @endif
                        @if ( $user->isActive() )
                            <span class="block text-green-600">
                                Accout Active
                                <i class="fas fa-link"></i>
                            </span>
                        @else
                            <span class="block text-red-600">
                                Accout Deactived
                                <i class="fas fa-unlink"></i>
                            </span>
                        @endif

                    </p>
        
                </div>
        
                <hr>
        
                <div class="p-6">
        
                    <dl>
        
                        <div class="lg:grid lg:grid-cols-4 md:gap-6 py-1">
                            <dt class="font-semibold text-teal-600">Email</dt>
                            <dd class="sm:col-span-3 lg:text-right">
                                {{ $user->email }}
                            </dd>
                        </div>
        
                        <div class="lg:grid lg:grid-cols-4 md:gap-6 py-1">
                            <dt class="font-semibold text-teal-600">Created</dt>
                            <dd class="sm:col-span-3 lg:text-right">
                                {{ $user->created_at->isoFormat('lll') }}
                            </dd>
                        </div>
        
                    </dl>
        
                </div>
                

                @if ( $user->isApproved() )

                    <div class="bg-gray-200 rounded-b-lg text-right p-6">
                        
                        <form action="{{ $user->isActive() ? route('admin.users.deactivate', $user) : route('admin.users.activate', $user) }}" method="POST">
            
                            @csrf
                            @method('put')
            
                            <button 
                                type="submit"
                                class="{{ $user->isActive() ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} focus:outline-none focus:shadow-outline font-semibold text-white rounded-lg px-4 py-2" 
                            >
                                @if ( $user->isActive() )
                                    <i class="fas fa-unlink"></i>
                                    Deactivate 
                                @else
                                    <i class="fas fa-link"></i>
                                    Activate
                                @endif
                            </button>
                            
                        </form>
    
                    </div>

                @endif
        
            </div>

        </div>


        <hr class="border-gray-500 my-12">


        {{-- User Roles --}}
        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">User Roles</h1>
                <p>Manager users roles</p>
            </div>


            <div class="lg:col-span-2 bg-white rounded-lg">
                    

                <div class="p-6">


                    @foreach ($roles as $role)


                        
                        <div class="{{ $loop->last ? 'border-t border-gray-300' : '' }} flex items-center justify-between hover:bg-gray-200 p-4">

                            <p class="font-semibold {{ $user->roles->pluck('name')->contains( $role->name ) ? 'text-green-600' : 'text-red-600' }}">
                                {{ $role->name  == 'pep upload' ? 'Past Examination Paper Upload' : 'Course Materials Upload'}}
                            </p>

                            @if ( $user->isApproved() )

                                <div>
                                    
                                    @if ( $user->roles->pluck('name')->contains( $role->name ) )
                        
                                        <form
                                            method="post"
                                            action="{{ route('admin.users.roles.destroy', [ 'user' => $user, 'role' => $role ]) }}"
                                        >
                
                                            @csrf
                                            @method('delete')

                                            <button
                                                type="submit"
                                                class="flex items-center justify-around w-8 h-8 bg-red-600 hover:bg-red-700 text-white rounded-full focus:outline-none focus:shadow-outline"
                                            >
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                
                                        </form>
                                    
                                    @else
                                    
                                        <form
                                            method="post"
                                            action="{{ route('admin.users.roles.add', [ 'user' => $user, 'role' => $role ]) }}"
                                        >
                
                                            @csrf
                                            @method('put')

                                            <button
                                                type="submit"
                                                class="flex items-center justify-around w-8 h-8 bg-green-600 hover:bg-green-700 text-white rounded-full focus:outline-none focus:shadow-outline"
                                            >
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                
                                        </form>
                                        
                                    @endif

                                </div>
                                
                            @endif

                        </div>

                    @endforeach

                </div>
        
            </div>

        </div>


        {{-- Password Reset --}}
        @if ( $user->isApproved() )
        
            
            <hr class="border-gray-500 my-12">

        
            <div class="grid lg:grid-cols-3 gap-6">
                <div>
                    <h1 class="text-lg font-semibold">Password Reset</h1>
                    <p></p>
                </div>
                                
                {{-- Resrt Password --}}
                <div class="lg:col-span-2 bg-white rounded-lg">
            
                    
                    <div class="p-6">
                        <p class="mb-1">Please click the button below to reset this account password to</p>
                        <span class="bg-yellow-600 rounded-full font-semibold px-2 py-1">pass1234</span>
                    </div>

                    
            
                    <form action="{{ route('admin.users.password.reset', $user) }}" method="POST" class="bg-gray-200 rounded-b-lg text-right p-6">
        
                        @csrf
                        @method('put')
        
                        <button
                            type="submit"
                            class="rounded-lg bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline font-semibold text-white px-4 py-2"
                        >
                            <i class="fas fa-sync-alt"></i>
                            Reset
                        </button>
        
                    </form>
            
                </div>
                
            </div>

        
        @endif
    


    </div>


@endsection