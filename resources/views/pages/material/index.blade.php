@extends('layouts.material')


@section('content')


    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="mb-12">

            <div class="mb-6">
                <h1 class="text-lg font-semibold mb-1">Looking for Course Materials?</h1>
                <p>You can search by typing the course title, course code or lecturer name.</p>
            </div>

            <div class="">


                <form action="{{ route('materials.search') }}" method="post" id="searchForm">

                    @csrf

                    <label class="block text-gray-600 font-semibold mb-1">Search Query</label>
                    <div class="flex">
    
                        <input
                            type="text" name="query" id="searchQuery"
                            class="w-full rounded-l-lg  focus:outline-none focus:shadow-outline px-4 py-2" id="paperSearch" autocomplete="off" >
    
                        <button
                            class="rounded-r-lg font-semibold bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:shadow-outline px-4 py-2"
                            id="searchPaperButton" type="submit"
                            >
                            Search
                        </button>
    
                    </div>
                    <p class="text-red-600 text-sm font-semibold mt-1" id="errorMessage">
                        @if ( $errors->has('query') )
                            {{ $errors->first('query') }}    
                        @endif
                    </p>

                </form>


            </div>

        </div>



        <div id="response">

            <noscript>
                <p class="text-center font-semibold rounded-lg bg-red-100 text-red-600 p-6 mb-12">Please enable JavaScript!</p>
            </noscript>

            <div class="text-center text-gray-900">
                <img src="{{ asset('svg/location search.svg') }}" alt="" class="inline-block  w-40 max-w-xs mb-3">
                <p>Waiting to search!</p>
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