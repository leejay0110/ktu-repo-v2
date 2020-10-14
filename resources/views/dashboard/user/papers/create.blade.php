@extends('layouts.user')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('user.papers') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Past Examination Papers</a></li>
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
                <h1 class="text-lg font-semibold">Add Past Examination Papers</h1>
                <p>Please fill out the form and select a PDF file version of the past examination paper.</p>
    
            </div>
    
            <form
                action="{{ route('user.papers.store') }}" method="post"
                class="col-span-2 bg-gray-100 rounded-lg"
                enctype="multipart/form-data"
            >

                @csrf
                
                <div class="p-6">

                    <div class="mb-3">
                        <label for="course_code" class="text-gray-600 font-semibold block mb-1">Course Code</label>
                        <input
                            required type="text" name="course_code" id="course_code" minlength="3"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_code') }}"
                        >
                        @if ($errors->has('course_code'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('course_code') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="course_title" class="text-gray-600 font-semibold block mb-1">Course Title</label>
                        <input
                            required type="text" name="course_title" id="course_title"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_title') }}"
                        >
                        @if ($errors->has('course_title'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('course_title') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="examiner" class="text-gray-600 font-semibold block mb-1">Examiner Name</label>
                        <input
                            required type="text" name="examiner" id="examiner"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('examiner') }}"
                        >
                        @if ($errors->has('examiner'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('examiner') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="year" class="text-gray-600 font-semibold block mb-1">Examination Year</label>
                        <select
                            name="year" id="year"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            required
                        >
                            <option disabled selected>Choose year</option>
                            @for ($i = 1997; $i <= now()->year; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @if ($errors->has('year'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('year') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="semester" class="text-gray-600 font-semibold block mb-1">Semester</label>
                        <select
                            name="semester" id="semester"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            required
                        >
                            <option disabled selected>Choose semester</option>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                        </select>
                        @if ($errors->has('semester'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('semester') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="paper" class="text-gray-600 font-semibold block mb-1">File</label>
                        <input
                            required type="file" name="paper" id="paper"
                            class="w-full lg:w-2/3 text-gray-900"
                            accept="application/pdf"
                        >
                        @if ($errors->has('paper'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('paper') }}</p>
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