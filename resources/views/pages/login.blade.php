@extends('layouts.app')
@section('app_title', '- Login & Signup')


@section('content')


    @include('partials.flash')


    
    <div class="max-w-screen-lg mx-auto px-4 py-12">
        
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
    
    
            <div>
                <h1 class="text-lg font-semibold uppercase">{{ env('APP_NAME') }} LOGIN</h1>
                <p>Please enter your login details to gain access.</p>
            </div>



            <div class="lg:col-span-2">

                <form class="w-full bg-gray-100 rounded-lg mb-6" action="{{ route('login') }}" method="POST">
        
                    @csrf
        
                    <div class="p-6">

                        <div class="mb-3">
                            <label for="email" class="text-gray-600 font-semibold block mb-1">Email</label>
                            <input
                                required type="email" name="email" id="enail"
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('email') }}"  maxlength="254"
                            >
                            @if ($errors->has('email'))
                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
        
                        <div class="mb-3">
                            <label for="password" class="text-gray-600 font-semibold block mb-1">Password</label>
                            <input
                                required type="password" name="password" id="password"
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            >
                            @if ($errors->has('password'))
                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
            
                    </div>
        
                    <div class="text-right bg-gray-200 rounded-b-lg p-6">
                        <button class="rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                            Login
                        </button>
                    </div>
        
                </form>
    
                <p class="">
                    Forgot your password?
                    <a href="#" class="text-blue-600 font-semibold">Reset.</a>
                </p>
                
            </div>
            
        
    
        </div>


        <hr class="border-gray-500 my-12">


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
    
            <div>
                <h1 class="text-lg font-semibold uppercase">Register</h1>
                <p>Please provide the neccessary info to create your account.</p>
            </div>
            

            <div class="lg:col-span-2">

                <form class="w-full bg-gray-100 rounded-lg mb-6" action="{{ route('register') }}" method="POST">
        
                    @csrf
        
                    <div class="p-6">

                        <div class="mb-3">
                            <label for="name" class="text-gray-600 font-semibold block mb-1">Name</label>
                            <input
                                required type="text" name="name" id="name" minlength="3"
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('name') }}"
                            >
                            @if ($errors->has('name'))
                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
    
                        <div class="mb-3">
                            <label for="email" class="text-gray-600 font-semibold block mb-1">Email Address</label>
                            <input
                                required type="email" name="r_email" id="email"
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                                value="{{ old('r_email') }}" maxlength="254"
                            >
                            @if ($errors->has('r_email'))
                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('r_email') }}</p>
                            @endif
                        </div>
        
                        <div class="mb-3">
                            <label for="password" class="text-gray-600 font-semibold block mb-1">Password</label>
                            <input
                                required type="password" name="r_password" id="password" minlength="6"
                                class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            >
                            @if ($errors->has('r_password'))
                                <p class="text-red-600 text-sm font-semibold">{{ $errors->first('r_password') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">

                            <label class="text-green-600 font-semibold block mb-1">Account Type</label>

                            <div class="mr-3">
                                <input type="radio" id="paper" name="role" value="pep upload" required>
                                <label class="text-gray-600 font-semibold" for="paper">Passco account</label>
                            </div>
                            
                            <div class="">
                                <input type="radio" id="course_material" name="role" value="cm upload">
                                <label class="text-gray-600 font-semibold" for="course_material">Course material account</label>
                            </div>

                        </div>
            
            
                    </div>
        
                    <div class="text-right bg-gray-200 rounded-b-lg p-6">
                        <button class="rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                            Sign up
                        </button>
                    </div>
        
                </form>
                
            </div>
    
        </div>

        
    </div>



@endsection