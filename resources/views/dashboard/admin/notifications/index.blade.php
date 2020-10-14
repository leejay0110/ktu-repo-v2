@extends('layouts.admin')


@section('navbar')

    <nav>
        <ul class="flex text-white font-semibold">
            <li>Notifications</li>
        </ul>
    </nav>

@endsection


@section('content')
    

    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="grid lg:grid-cols-4 gap-6">

            <div>
                
                <div class="mb-6">
                    <h1 class="font-semibold text-lg">Notifications</h1>
                    <p>Manage all notifications here</p>
                </div>

                <div>
                    <a class="inline-block text-center font-semibold rounded-lg text-white bg-green-600 px-4 py-2 mb-3" href="">
                        <i class="fas fa-envelope-open"></i>
                        Mark all as read
                    </a>
                    
                    <br>

                    <a class="inline-block text-center font-semibold rounded-lg text-white bg-red-600 px-4 py-2" href="">
                        <i class="fas fa-trash"></i>
                        Delete all
                    </a>

                </div>
                
            </div>
            
            
            <div class="lg:col-span-3 w-full bg-gray-100 rounded-lg p-6">
            
                
                <table class="table-fixed border-collapse w-full">
            
                    <thead class="">
                        <tr class="rounded-lg font-semibold text-blue-600">
                            <th class="p-4 text-left">Notification</th>
                            <th class="p-4 text-right">Created</th>
                        </tr>
                    </thead>
                    
                    <tbody class="text-sm">
            
                        <tr class="hover:bg-gray-200 border-t border-gray-300 font-semibold">
                            <td class="p-4 text-left">A new user has registered</td>
                            <td class="p-4 text-right">September 30, 2020 11:57 AM</td>
                        </tr>
                        
                        <tr class="hover:bg-gray-200 border-t border-gray-300">
                            <td class="p-4 text-left">A new user has registered</td>
                            <td class="p-4 text-right">September 30, 2020 11:17 AM</td>
                        </tr>
            
                        <tr class="hover:bg-gray-200 border-t border-gray-300">
                            <td class="p-4 text-left">A new user has registered</td>
                            <td class="p-4 text-right">August 31, 2020 2:23 PM</td>
                        </tr>
            
                    </tbody>
                </table>
            
            
            </div>

        </div>


    </div>


@endsection