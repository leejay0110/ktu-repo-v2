@extends('layouts.material')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li><a href="{{ route('materials') }}" class="text-orange-300 focus:outline-none focus:shadow-outline rounded-lg">Course Materials</a></li>
            <li><span class="mx-2">/</span></li>
            <li>{{ $user->name }}</li>
        </ul>
    </nav>

@endsection



@section('content')


    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="max-w-screen-lg mx-auto">


            <div class="grid lg:grid-cols-3 gap-6">

                <div>
                    <h1 class="text-lg font-semibold">User</h1>
                    <p>User details</p>
                </div>

                <div class="lg:col-span-2 bg-gray-100 rounded-lg p-6">

                    <div class="text-center">
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
                        <p class="text-gray-900 font-semibold">{{ $user->name }}</p>

                    </div>

                </div> 
    
            </div>

            <hr class="border-gray-500 my-12">


            <div class="grid lg:grid-cols-3 gap-6">


                <div>
                    <h1 class="text-lg font-semibold">Course Materials</h1>
                    <p>Course materials uploaded by {{ $user->name }}.</p>
        
                </div>
        
                
                <div class="lg:col-span-2 bg-gray-100 rounded-lg overflow-x-auto">
        
                    @if ( $user->materials->count() )
            
                        <div class=" p-6">
            
                            <table class="table-auto border-collapse w-full">
                    
                                <thead>
                                    <tr class="font-semibold text-blue-600 text-left">
                                        <th class="p-4">Course</th>
                                        <th class="p-4">Created</th>
                                    </tr>
                                </thead>
                                
                                <tbody class="">
            
                                    @foreach ($user->materials as $material)
                                    
                                        <tr class="hover:bg-gray-300 border-t border-gray-300 text-left">
                                            <td class="p-4">
                                                <a
                                                    href="{{ route('materials.show', $material) }}"
                                                    class="text-blue-600"
                                                >
                                                    {{  $material->course_code }} ~ {{ $material->course_title }}
                                                </a>
                                            </td>
                                            <td class="p-4">{{ $material->created_at->isoFormat('lll') }}</td>
                                        </tr>
                                        
                                    @endforeach
                    
                    
                                </tbody>
                            </table>
                            
                        </div> 
            
                    @else
            
                        <div class="text-center p-6">
                            
                            <img src="{{ asset('svg/empty.svg') }}" alt="" class="inline-block w-40 max-w-xs mb-3">    
    
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