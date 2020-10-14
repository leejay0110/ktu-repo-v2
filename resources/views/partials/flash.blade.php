@if (session('error'))

    <div x-data="{ isOpen: true }">

        <div class="max-w-screen-lg mx-auto px-4 mt-12" x-show="isOpen">

            <div class="flex items-center justify-between bg-red-200 text-red-900 rounded-lg">
        
                <div class="font-semibold p-4">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
    
                <button @click="isOpen = false" class="rounded-r-lg p-4 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-times"></i>
                </button>
            
            </div>

        </div>

    </div>      

@endif

@if (session('success'))

    <div x-data="{ isOpen: true }">

        <div class="max-w-screen-lg mx-auto px-4 mt-12" x-show="isOpen">

            <div class="flex items-center justify-between bg-green-200 text-green-900 rounded-lg">
        
                <div class="font-semibold p-4">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
    
                <button @click="isOpen = false" class="rounded-r-lg p-4 focus:outline-none focus:shadow-outline">
                    <i class="fas fa-times"></i>
                </button>
            
            </div>

        </div>

    </div>

@endif