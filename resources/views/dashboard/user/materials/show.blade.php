@extends('layouts.user')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('user.materials') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Course Materials</a></li>
            <li><span class="mx-2">/</span></li>
            <li>Course Material Details</li>
        </ul>
    </nav>

@endsection


@section('content')


    @include('partials.flash')


    <div class="max-w-screen-lg mx-auto px-4 py-12" >


        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">Course Materials</h1>
                <p>Update course material details</p>
            </div>
    
            <form
                action="{{ route('user.materials.update', $material) }}" method="post"
                class="col-span-2 bg-gray-100 rounded-lg"
            >

                @csrf
                @method('put')
                
                <div class="p-6">

                    <div class="mb-3">
                        <label for="course_code" class="text-gray-600 font-semibold block mb-1">Course Code</label>
                        <input
                            type="text" name="course_code" id="course_code" minlength="3"
                            class="w-full lg:w-2/3 font-semibold text-gray-900 rounded-lg border border-gray-400 focus:outline-none px-4 py-2"
                            value="{{ old('course_code') ?? $material->course_code }}" required
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
                            value="{{ old('course_title') ?? $material->course_title }}" required
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
                            value="{{ old('lecturer') ?? $material->lecturer }}" required
                        >
                        @if ($errors->has('lecturer'))
                            <p class="text-red-600 text-sm font-semibold">{{ $errors->first('lecturer') }}</p>
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


        <hr class="border-gray-500 my-12">


        <div class="grid lg:grid-cols-3 gap-6">

            <div class="mb-6">
                <h1 class="text-lg font-semibold">Files</h1>
                <p>Manage course material files</p>
            </div>

            <div class="lg:col-span-2">

                <div class="bg-gray-100 rounded-lg w-full mb-6">

                    @if ( $material->files->count() )
    
                        <div class="p-6">
                            <table class="table-auto border-collapse w-full">
        
                                <thead>
                                    <tr class="text-left text-blue-600">
                                        <th class="p-4">Filename</th>
                                        <th class="p-4">Size</th>
                                        <th class="p-4"></th>
                                        <th class="p-4"></th>
                                    </tr>
                                </thead>
        
                                <tbody>
        
                                    @foreach ($material->files as $file)
        
                                        <tr class="hover:bg-gray-300 border-t border-gray-300'">
                                            <td class="p-4">
                                                <p title="{{ $file->filename }}">{{  str_replace('_', ' ', $file->filename) }}</p>
                                            </td>
                                            <td class="p-4">{{ $file->size() }}</td>
                                            <td class="p-4">

                                                <form id="delete-file-{{ $file->id }}" action="{{ route('user.materials.files.destroy', $file) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button type="submit" class="flex items-center justify-around w-8 h-8 rounded-full bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:shadow-outline">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>

                                                </form>
                                            </td>
                                            <td class="p-4">
                                                <a
                                                    href="{{ route('download.materials.file', $file) }}"
                                                    class="flex items-center justify-around w-8 h-8 rounded-full bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline"
                                                >
                                                    <i class="fas fa-arrow-down"></i>
                                                </a>
                                            </td>
                                        </tr>
    
                                    @endforeach
        
                                </tbody>
        
                            </table>
                        </div>
                        
                        @if ( $material->files->count() > 1 )
            
                            <div class="bg-gray-200 text-right rounded-b-lg p-6">

                                <a href="{{ route('download.materials.zip', $material) }}" class="rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                                    <i class="fas fa-file-archive"></i>
                                    Download All
                                </a>

                            </div>

                        @endif
                        
                        
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


                <div class="bg-gray-100 rounded-lg w-full">

                    <form action="{{ route('user.materials.files.upload', $material) }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="p-6">

                            {{-- <h1 class="text-lg font-semibold mb-3">Add more files</h1> --}}

                            <div class="mb-3">
                                <label for="files" class="text-gray-600 font-semibold block mb-1">Attach files</label>
                                <input
                                    type="file" name="files[]" id="files"
                                    class="w-full lg:w-2/3 text-gray-900 focus:outline-none focus:shadow-outline"
                                    multiple
                                >
                                @if ($errors->has('files'))
                                    <p class="text-red-600 text-sm font-semibold">{{ $errors->first('files') }}</p>
                                @endif
                            </div>

                        </div>


                        <div class="bg-gray-200 text-right rounded-b-lg p-6">

                            <button class="rounded-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                                Upload
                            </button>
        
                        </div>

                    </form>

                </div>
                
            </div>

        </div>

        <hr class="border-gray-500 my-12">


        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">Delete Course Material</h1>
                <p>Delete this course material and its related files</p>
            </div>
    
            <form
                action="{{ route('user.materials.update', $material) }}" method="post"
                class="col-span-2 bg-gray-100 rounded-lg"
            >

                @csrf
                @method('put')
                
                <div class="p-6">

                    <p>Click on the button below to delete this course material and its related files.</p>
                    <p class="text-red-600">
                        <i class="fas fa-info-circle"></i>
                        This action is irreversible.
                    </p>
        
                </div>

                <div class="bg-gray-200 text-right rounded-b-lg p-6">


                    <form action="{{ route('user.materials.destroy', $material) }}" method="post">
                    
                        @csrf
                        @method('delete')
                        
                        <button class="rounded-lg font-semibold bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:shadow-outline px-4 py-2" type="submit">
                            Delete
                        </button>

                    </form>


                </div>


            </form>       

        </div>

        
    </div>


@endsection