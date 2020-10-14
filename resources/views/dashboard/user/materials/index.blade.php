@extends('layouts.user')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li>Course Materials</li>
        </ul>
    </nav>

@endsection


@section('content')


    @include('partials.flash')


    <div class="max-w-screen-lg mx-auto px-4 py-12" >


        <div class="grid lg:grid-cols-4 gap-6">


            <div>
                <h1 class="text-lg font-semibold">Course Materials</h1>
                <p>Manage all course materials.</p>
    
                <div class="mt-3">
        
                    <a
                        href="{{ route('user.materials.create') }}" 
                        class="bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline text-white inline-block rounded-lg font-semibold px-4 py-2"
                    >
                        <i class="fas fa-plus-circle"></i>
                        Add New
                    </a>
        
                </div>
    
            </div>
    
            
            <div class="lg:col-span-3">
    
                @if ( Auth::user()->materials->count() )
        
                    <div class="bg-gray-100 rounded-lg overflow-x-auto p-6">
        
                        <table class="table-auto border-collapse w-full">
                
                            <thead>
                                <tr class="font-semibold text-blue-600 text-left">
                                    <th class="p-4">Course</th>
                                    <th class="p-4">Examiner</th>
                                    <th class="p-4">Created</th>
                                </tr>
                            </thead>
                            
                            <tbody class="">
        
                                @foreach (Auth::user()->materials as $material)
                                
                                    <tr class="hover:bg-gray-300 border-t border-gray-300 text-left">
                                        <td class="p-4">
                                            <a
                                                href="{{ route('user.materials.show', $material) }}"
                                                class="text-blue-600"
                                            >
                                                {{  $material->course_code }} ~ {{ $material->course_title }}
                                            </a>
                                        </td>
                                        <td class="p-4">{{ $material->lecturer }}</td>
                                        <td class="p-4">{{ $material->created_at->isoFormat('lll') }}</td>
                                    </tr>
                                    
                                @endforeach
                
                
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