<div class="w-full text-blue-100 bg-gray-900 px-4 pt-12 pb-24">


    <div class="max-w-screen-lg mx-auto grid lg:grid-flow-col lg:grid-cols-2 gap-12">

        <div class="text-center">
            <h3 class="text-lg text-teal-600 font-semibold mb-3">{{ env('APP_NAME') }}</h3>
            <p class="text-gray-600">
                Copyright &COPY; {{ now()->year }} <br>
                repo.ktu.edu.gh
            </p>
        </div>
        

        <div class="text-center">

            <h5 class="text-lg text-teal-600 font-semibold mb-3">Site Links</h5>

            <div class="text-gray-600">
                
                <a
                    class="block rounded-lg hover:bg-gray-800 hover:text-gray-100 foucs:bg-gray-900 focus:outline-none focus:shadow-outline px-4 py-2"
                    href="{{ route('home') }}">
                    Home
                </a>
                <a
                    class="block rounded-lg hover:bg-gray-800 hover:text-gray-100 foucs:bg-gray-900 focus:outline-none focus:shadow-outline px-4 py-2"
                    href="{{ route('papers') }}">
                    Past Examination Papers
                </a>
                <a
                    class="block rounded-lg hover:bg-gray-800 hover:text-gray-100 foucs:bg-gray-900 focus:outline-none focus:shadow-outline px-4 py-2"
                    href="{{ route('materials') }}">
                    Course Materials
                </a>
                <a
                    class="block rounded-lg hover:bg-gray-800 hover:text-gray-100 foucs:bg-gray-900 focus:outline-none focus:shadow-outline px-4 py-2"
                    href="{{ route('about') }}">
                    About
                </a>
                
                
                @guest
                    <a
                        class="block rounded-lg hover:bg-gray-800 hover:text-gray-100 foucs:bg-gray-900 focus:outline-none focus:shadow-outline px-4 py-2"
                        href="{{ route('login') }}">
                        Login
                    </a>
                @endguest


            </div>
            
        </div>
        
    </div>
    
    
</div>