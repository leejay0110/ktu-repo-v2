@extends('layouts.user')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('user.papers') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Past Examination Papers</a></li>
            <li><span class="mx-2">/</span></li>
            <li>Paper Details</li>
        </ul>
    </nav>

@endsection


@section('content')


    @include('partials.flash')


    <div class="max-w-screen-lg mx-auto px-4 py-12" >
        
        {{-- paper details --}}
        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold mb-2">Paper Details</h1>
                <p>Update the details of this past examination paper or delete the entire paper.</p>
            </div>


            <form action="{{ route('user.papers.update', $paper) }}" method="POST" class="bg-gray-100 rounded-lg col-span-2">

                @csrf
                @method('put')
            
                <div class="p-6">

                    <div class="mb-3">
                        <label for="course_code" class="text-gray-600 font-semibold block mb-1">Course Code</label>
                        <input
                            required type="text" name="course_code" id="course_code" minlength="3"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_code') ?? $paper->course_code }}"
                        >
                        @if ($errors->has('course_code'))
                            <p class="text-red-600 text-sm text-right font-semibold">{{ $errors->first('course_code') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="course_title" class="text-gray-600 font-semibold block mb-1">Course Title</label>
                        <input
                            required type="text" name="course_title" id="course_title"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_title') ?? $paper->course_title }}"
                        >
                        @if ($errors->has('course_title'))
                            <p class="text-red-600 text-sm text-right font-semibold">{{ $errors->first('course_title') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="examiner" class="text-gray-600 font-semibold block mb-1">Examiner Name</label>
                        <input
                            required type="text" name="examiner" id="examiner"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('examiner') ?? $paper->examiner }}"
                        >
                        @if ($errors->has('examiner'))
                            <p class="text-red-600 text-sm text-right font-semibold">{{ $errors->first('examiner') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="year" class="text-gray-600 font-semibold block mb-1">Examination Year</label>
                        <select
                            name="year" id="year"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            required
                        >
                            <option disabled>Choose year</option>
                            @for ($i = 1997; $i <= now()->year; $i++)
                                <option value="{{ $i }}" {{ $paper->year == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        @if ($errors->has('year'))
                            <p class="text-red-600 text-sm text-right font-semibold">{{ $errors->first('year') }}</p>
                        @endif
                    </div>

                    <div>
                        <label for="semester" class="text-gray-600 font-semibold block mb-1">Semester</label>
                        <select
                            name="semester" id="semester"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            required
                        >
                            <option disabled selected>Choose semester</option>
                            <option value="1" {{ $paper->semester == 1 ? 'selected' : '' }}>Semester 1</option>
                            <option value="2" {{ $paper->semester == 2 ? 'selected' : '' }}>Semester 2</option>
                        </select>
                        @if ($errors->has('semester'))
                            <p class="text-red-600 text-sm text-right font-semibold">{{ $errors->first('semester') }}</p>
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



        <hr class="border-gray-500 my-12">


        {{-- File Details --}}
        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold mb-2">File</h1>
                <p>Download the past examination paper pdf file.</p>
            </div>
            

            <div class="bg-gray-100 rounded-lg col-span-2">

                <div class="p-6">
                    
                    <p class="font-semibold text-blue-600 mb-3">
                        <span class="text-gray-600">Filename:</span> <br>
                        {{ $paper->filename }}
                    </p>

                    <p class="font-semibold text-blue-600">
                        <span class="text-gray-600">Size:</span> <br>
                        {{ $paper->size() }}
                    </p>

                </div>

                <div class="bg-gray-200 rounded-b-lg text-right p-6">

                    <a
                        href="{{ route('download.paper', $paper) }}"
                        class="inline-block rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2"
                    >
                        Download
                    </a>

                </div>


            </div>

        </div>


        <hr class="border-gray-500 my-12">


        {{-- Delete Paper --}}
        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold mb-2">Delete</h1>
                <p>Deletet this past examination paper.</p>
            </div>
            

            <div class="bg-gray-100 rounded-lg col-span-2">

                <form action="{{ route('user.papers.delete', $paper) }}" method="post">

                    @csrf
                    @method('delete')


                    <div class="p-6">

                        please click on the button below to delete this past examination paper

                    </div>

                    <div class="bg-gray-200 rounded-b-lg text-right p-6">

                        <button type="submit" class="inline-block rounded-lg font-semibold bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:shadow-outline px-4 py-2">
                            Delete
                        </button>

                    </div>

                    
                </form>


            </div>

        </div>
        

    </div>


@endsection