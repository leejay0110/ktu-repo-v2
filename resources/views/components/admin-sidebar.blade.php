<div class="flex items-center justify-between bg-blue-900 text-white p-4">

    <div class="text-lg font-semibold">
        <i class="fas-fa-shield"></i>
        Admin Dashboard
    </div>

    <button class="bg-red-600 hover:bg-red-700 rounded-lg focus:outline-none focus:shadow-outline px-4 py-2" id="sidebar-close" @click="isOpen = false">
        <i class="fas fa-times"></i>
    </button>

</div>


<div class="px-4 py-6 text-center bg-gray-200 text-black">

    <i class="block fas fa-user-shield text-6xl mb-3"></i>
    
    <h1 class="font-semibold ">{{ Auth::user()->name }}</h1>
    <p class="">{{ Auth::user()->email }}</p>

</div>


<div>

    <ul class="font-semibold text-blue-600 p-4">

        <li>
            <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('admin') }}">
                <i class="fas fa-tachometer-alt w-6"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('admin.notifications') }}">
                <i class="fas fa-bell w-6"></i>
                Notifications
            </a>
        </li>
        <li>
            <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('admin.users') }}">
                <i class="fas fa-users w-6"></i>
                Users
            </a>
        </li>
        <li>
            <a class="rounded-lg hover:bg-gray-300 block hover:text-teal-600 px-4 py-2" href="{{ route('admin.profile') }}">
                <i class="fas fa-user w-6"></i>
                Profile
            </a>
        </li>
        

    </ul>

</div>