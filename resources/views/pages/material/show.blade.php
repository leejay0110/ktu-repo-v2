@extends('layouts.material')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('materials') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Course Materials</a></li>
            <li><span class="mx-2">/</span></li>
            <li>Course Material Details</li>
        </ul>
    </nav>

@endsection



@section('content')


    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="max-w-screen-lg mx-auto">


            <div class="grid lg:grid-cols-3 gap-6">

                <div>
                    <h1 class="text-lg font-semibold">Course Material</h1>
                    <p>Course material details</p>
                </div>

                <div class="lg:col-span-2 bg-gray-100 rounded-lg">

                    <div class="p-6">
                        
                        <div class="font-semibold">
                            <p class="text-gray-600 font-semibold">{{ $material->course_code }}</p>
                            <p class="">{{ $material->course_title }}</p>
                        </div>
    
                        <hr class="my-3">
    
                        <div class="mb-3 font-semibold">
                            <h1 class="text-gray-600 font-semibold">Lecturer</h1>
                            <p class="">{{ $material->lecturer }}</p>
                        </div>
    
                        <p class="text-blue-600 text-sm">{{ $material->created_at->isoFormat('lll') }}</p>
                        
                    </div>


                    <div class="bg-gray-200 text-right rounded-b-lg p-6">

                        <a
                            href="{{ route('materials.user', $material->user ) }}"
                            class="text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full focus:outline-none focus:shadow-outline px-4 py-2"
                        >
                            <i class="fas fa-eye"></i>
                            View User
                        </a>

                    </div>

                </div> 
    
            </div>

        </div>


        <hr class="border-gray-500 my-12">


        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">Files</h1>
                <p>Download files attached to this course material</p>
            </div>

            <div class="lg:col-span-2">

                <div class="bg-gray-100 rounded-lg w-full">

                    @if ( $material->files->count() )
    
                        <div class="p-6">
                            <table class="table-auto border-collapse w-full">
        
                                <thead>
                                    <tr class="text-left text-blue-600">
                                        <th class="p-4">Filename</th>
                                        <th class="p-4">Size</th>
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
    
                        <div class="text-center p-6">
                                
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


    </div>

    
@endsection





@section('scripts')

    <script src="{{ asset('js/axios.min.js') }}"></script>

    <script>

        const getData = (event) => {

            event.preventDefault()

            const query = document.getElementById('searchQuery').value;
            let errorMessage = "";


            axios({
                    method: 'post',
                    url: '{{ route('materials.search') }}',
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    data: {
                        query: query
                    }
                })
                .then(function (response) {
                    document.getElementById('response').innerHTML = response.data;
                })
                .catch(function (error) {
                    errorMessage = error.response.data.errors.query;
                })
                .then(function () {
                    document.getElementById('errorMessage').innerHTML = errorMessage;
                });

        };
        
        document.getElementById('searchForm').addEventListener('submit', getData);


    </script>
    
@endsection