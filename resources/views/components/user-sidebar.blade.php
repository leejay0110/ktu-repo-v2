<div class="flex items-center justify-between bg-blue-900 text-white p-4">

    <div class="text-lg font-semibold">
        <i class="fas-fa-user-circle"></i>
        User Dashboard
    </div>

    <button class="bg-red-600 hover:bg-red-700 rounded-lg focus:outline-none focus:shadow-outline px-4 py-2" id="sidebar-close" @click="isOpen = false">
        <i class="fas fa-times"></i>
    </button>

</div>


<div class="px-4 py-6 text-center bg-gray-200 text-black">

    <div class="text-center mb-3">
        @if ( Auth::user()->avatar )
            <img src="{{ asset('/storage' . Str::after(Auth::user()->avatar, 'public')) }}" alt="avatar" class="inline rounded-full w-20 h-20">
        @else
            <div class="flex items-center justify-around w-20 h-20 mx-auto rounded-full bg-blue-900 mb-3">
                <p class="uppercase font-semibold text-4xl text-white">{{ Str::substr(Auth::user()->name, 0, 1) }}</p>
            </div>
        @endif
    </div>
    
    <h1 class="font-semibold ">{{ Auth::user()->name }}</h1>
    <p>{{ Auth::user()->email }}</p>

</div>


<div>

    <ul class="font-semibold text-blue-600 p-4">

        <li class="mb-3">
            <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('user') }}">
                <i class="fas fa-tachometer-alt w-6"></i>
                Dashboard
            </a>
        </li>


        @if ( Auth::user()->roles->pluck('name')->contains('pep upload') )

            
            <li class="mb-3" x-data="{ open: false }">

                <div class="flex justify-between items-center cursor-pointer text-gray-900 px-4 py-2" @click="open = !open">
                    
                    <span>
                        <i class="fas fa-sticky-note w-6"></i>
                        Past Examination Papers
                    </span>

                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform lg:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>

                </div>


                <ul class="px-4 py-0" x-show="open">
                    <li>
                        <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('user.papers') }}">
                            <i class="fas fa-edit w-6"></i>
                            Manage Past Examination Papers
                        </a>
                    </li>
                    <li>
                        <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('user.papers.create') }}">
                            <i class="fas fa-plus-circle w-6"></i>
                            Add Past Examination Paper
                        </a>
                    </li>
                </ul>
            </li>

        @endif
    
    
        @if ( Auth::user()->roles->pluck('name')->contains('cm upload') )

            <li class="mb-3" x-data="{ open: false }">

                <div class="flex items-center justify-between cursor-pointer text-gray-900 px-4 py-2" @click="open = !open">
                    <span>
                        <i class="fas fa-book w-6"></i>
                        Course Materials
                    </span>

                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform lg:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>

                <ul class="px-4 py-0" x-show="open">
                    <li>
                        <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('user.materials') }}">
                            <i class="fas fa-edit w-6"></i>
                            Manage Course Materials
                        </a>
                    </li>
                    <li>
                        <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('user.materials.create') }}">
                            <i class="fas fa-plus-circle w-6"></i>
                            Add Course Materials
                        </a>
                    </li>
                </ul>
            </li>

        @endif

        <li>
            <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('user.profile') }}">
                <i class="fas fa-user w-6"></i>
                Profile
            </a>
        </li>
        

    </ul>

</div>