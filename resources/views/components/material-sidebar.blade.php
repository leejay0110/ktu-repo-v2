<div class="flex flex-col h-full">

    <div class="flex items-center justify-end bg-blue-900 text-white p-4">

        <button class="bg-red-600 hover:bg-red-700 rounded-lg focus:outline-none focus:shadow-outline px-4 py-2" id="sidebar-close" @click="isOpen = false">
            <i class="fas fa-times"></i>
        </button>
    
    </div>
    
    
    <div class="px-4 py-6 bg-gray-200 text-black">
    
        <h1 class="text-lg font-semibold">Lecturers</h1>
        <p>These are the users who upload course materials.</p>
    
    </div>
    
    
    <div class="p-4 flex-1 overflow-y-auto">
    
        
        <ul class="font-semibold text-blue-600">
            
            @forelse ($users as $user)
                <li class="{{ $loop->last ? '' : 'border-b' }}">
                    <a class="hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('materials.user', $user) }}">
                        {{ $user->name }}
                    </a>
                </li>
            @empty
                
            @endforelse
    
        </ul>
    
    </div>


</div>