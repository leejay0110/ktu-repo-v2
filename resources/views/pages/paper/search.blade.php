<div>

    @if ( $papers->count() )


        <div class="grid lg:grid-cols-2 gap-6">

            @foreach ($papers as $paper)
                
                <div class="flex flex-col justify-between rounded-lg bg-white">

                    <div class=" p-6">

                        <div class="font-semibold">
                            <p class="text-gray-600">{{ $paper->course_code }}</p>
                            <h1 class="text-lg text-gray-900">{{ $paper->course_title }}</h1>
                        </div>

                        <hr class="border-gray-400 my-3">

                        <p class="mb-3">
                            <span class="text-gray-600">Examiner</span> <br>
                            {{ $paper->examiner }}
                        </p>

                        <p class="mb-3">
                            <span class="text-gray-600">Year ~ Sem</span> <br>
                            {{ $paper->year }} ~ {{ $paper->semester }}
                        </p>

                        <p class="text-sm text-teal-600">
                            {{ $paper->created_at->isoFormat('lll') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-between bg-gray-200 rounded-b-lg p-6">

                        <p class="font-semibold">
                            File size
                            <span class="inline-block bg-teal-600 text-white text-sm rounded-full px-2">{{ $paper->size() }}</span>
                        </p>

                        <a
                            href="{{ route('download.paper', $paper) }}"
                            class="text-white font-semibold bg-green-600 hover:bg-green-700 rounded-full focus:outline-none focus:shadow-outline px-4 py-2"
                        >
                            <i class="fas fa-download"></i>
                            Download
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
