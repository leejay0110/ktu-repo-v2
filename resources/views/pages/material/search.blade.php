<div>

    @if ( $materials->count() )


        <div class="grid lg:grid-cols-2 gap-6">

            @foreach ($materials as $material)
                
                <div class="flex flex-col justify-between rounded-lg bg-white">

                    <div class=" p-6">

                        <div class="font-semibold">
                            <p class="text-gray-600">{{ $material->course_code }}</p>
                            <h1 class="text-lg text-gray-900">{{ $material->course_title }}</h1>
                        </div>

                        <hr class="border-gray-400 my-3">

                        <p class="mb-3">
                            <span class="text-gray-600 text-sm">Lecturer</span> <br>
                            {{ $material->lecturer }}
                        </p>

                        <p class="text-sm text-teal-600">
                            {{ $material->created_at->isoFormat('lll') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between bg-gray-200 rounded-b-lg p-6">

                        <p class="font-semibold">
                            Attached Files
                            <span class="inline-block rounded-full bg-teal-600 font-semibold text-sm text-white px-2">{{ $material->files->count() }}</span>
                        </p>

                        <a
                            href="{{ route('materials.show', $material) }}"
                            class="text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full focus:outline-none focus:shadow-outline px-4 py-2"
                        >
                            <i class="fas fa-eye"></i>
                            View
                        </a>

                    </div>

                </div>
    
            @endforeach

        </div>

    
    @else
    
        <div class="text-center">
            <img src="{{ asset('svg/void.svg') }}" alt="" class="inline-block w-40 max-w-xs mb-3">    
            <p class="text-gray-900">
                No results found!
            </p>
        </div>
        
    @endif 


</div>
