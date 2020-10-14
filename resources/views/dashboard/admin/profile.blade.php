@extends('layouts.admin')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li>User Profile</li>
        </ul>
    </nav>

@endsection


@section('content')


    @include('partials.flash')


    <div class="max-w-screen-lg mx-auto px-4 py-12" >

        
        {{-- Update Details --}}
        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">Profile Information</h1>
                <p>Update your account's profile information and email address.</p>
            </div>

            <div class="bg-gray-100 rounded-lg col-span-2">

                <form action="{{ route('admin.profile.details.update') }}" method="POST">
    
                    @csrf
                    @method('put')
        
                    <div class="p-6">
            
                        <div class="mb-6">
                            <label for="name" class="text-gray-600 font-semibold block mb-1">Name</label>
                            <input
                                name="name" id="name" type="text" minlength="3" required 
                                class="w-full lg:w-2/3 rounded-lg font-semibold text-gray-900 border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('name') ?? Auth::user()->name }}"
                            >
                            @if ($errors->has('name'))
                                <p class="text-red-600 text-sm font-semibold mt-1">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
        
                        <div>
                            <label class="text-gray-600 font-semibold block mb-1">Email Address</label>
                            <input
                                type="text" required readonly disabled
                                class="w-full lg:w-2/3 rounded-lg font-semibold text-gray-900 border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ Auth::user()->email }}"
                            >
                        </div>
            
                    </div>
        
                    <div class="bg-gray-200 text-right rounded-b-lg p-6">
        
                        <button class="rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                            Save
                        </button>
        
                    </div>
        
        
                </form>

            </div>

        </div>



        <hr class="border-gray-500 my-12">
        

        {{-- Update Password --}}
        <div class="grid lg:grid-cols-3 gap-6">
    
            <div>
                <h1 class="text-lg font-semibold">Update Password</h1>
                <p>Ensure your account is using a long, random password to stay secure.</p>
            </div>

            <div class="bg-gray-100 rounded-lg col-span-2">

                <form action="{{ route('admin.profile.password.update') }}" method="POST">
        
                    @csrf
                    @method('put')
        
                    <div class="p-6">
            
                        <div class="mb-6">
                            <label for="current_password" class="text-gray-600 font-semibold block mb-1">Current Password</label>
                            <input
                                type="password" name="current_password" id="current_password" required
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('current_password') }}"
                            >
                            @if ($errors->has('current_password'))
                                <p class="text-red-600 text-sm font-semibold mt-1">{{ $errors->first('current_password') }}</p>
                            @endif
                        </div>
        
                        <div class="mb-6">
                            <label for="password" class="text-gray-600 font-semibold block mb-1">New Password</label>
                            <input
                                type="password" name="password" id="password" minlength="6" required
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('password') }}"
                            >
                            @if ($errors->has('password'))
                                <p class="text-red-600 text-sm font-semibold mt-1">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
        
                        <div>
                            <label for="password_confirmation" class="text-gray-600 font-semibold block mb-1">Confirm Password</label>
                            <input
                                type="password" name="password_confirmation" id="password_confirmation" minlength="6" required
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('password_confirmation') }}"
                            >
                            @if ($errors->has('password_confirmation'))
                                <p class="text-red-600 text-sm font-semibold mt-1">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
            
                    </div>
        
                    <div class="bg-gray-200 rounded-b-lg text-right p-6">
                        <button class="rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                            Save
                        </button>
                    </div>
        
                </form>

            </div>
    
    
        </div>
    

    </div>




@endsection