@extends('layouts.user')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('user.materials') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Course Materials</a></li>
            <li><span class="mx-2">/</span></li>
            <li>Add New</li>
        </ul>
    </nav>

@endsection


@section('content')


    @include('partials.flash')


    <div class="max-w-screen-lg mx-auto px-4 py-12" >


        <div class="grid lg:grid-cols-3 gap-6">

            <div class="">
                <h1 class="text-lg font-semibold">Add Course Materials</h1>
                <p>Please fill out the form and select a PDF file version of the past examination paper.</p>
    
            </div>
    
            <form
                action="{{ route('user.materials.store') }}" method="post"
                class="col-span-2 bg-gray-100 rounded-lg"
                enctype="multipart/form-data"
            >

                @csrf
                
                <div class="p-6">

                    <div class="mb-3">
                        <label for="course_code" class="text-gray-600 font-semibold block mb-1">Course Code</label>
                        <input
                            type="text" name="course_code" id="course_code" minlength="3"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_code') }}" required
                        >
                        @if ($errors->has('course_code'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('course_code') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="course_title" class="text-gray-600 font-semibold block mb-1">Course Title</label>
                        <input
                            type="text" name="course_title" id="course_title"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_title') }}" required
                        >
                        @if ($errors->has('course_title'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('course_title') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="lecturer" class="text-gray-600 font-semibold block mb-1">Lecturer Name</label>
                        <input
                            type="text" name="lecturer" id="lecturer"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('lecturer') ?? Auth::user()->name }}" required
                        >
                        @if ($errors->has('lecturer'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('lecturer') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="files" class="text-gray-600 font-semibold block mb-1">File</label>
                        <input
                            type="file" name="files[]" id="files"
                            class="w-full lg:w-2/3 text-gray-900"
                            multiple
                        >
                        @if ($errors->has('files'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('files') }}</p>
                        @endif
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




@endsection