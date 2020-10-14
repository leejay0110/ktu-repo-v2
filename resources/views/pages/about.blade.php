@extends('layouts.app')
@section('app_title', '- About')


@section('content')


    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">About {{ env('APP_NAME') }}</h1>
                <p>A little information about {{ env('APP_NAME') }}</p>
            </div>

            <div class="lg:col-span-2 rounded-lg bg-gray-100 p-6">
                <p>
                    KTU Repo is the institutional repository of Koforidua Technical University. KTU Repo is an open-access online archive developed for the collection, preservation and distribution of digital resources. The platform was built as a final year project by four students of Korodidua Technical University.
                </p>
            </div>

        </div>


        <hr class="border-gray-500 my-12">


        <div class="grid lg:grid-cols-3 gap-6">

            <div>
                <h1 class="text-lg font-semibold">Why {{ env('APP_NAME') }}</h1>
                <p>A few reasons why we built {{ env('APP_NAME') }}</p>
            </div>

            <div class="lg:col-span-2 rounded-lg bg-gray-100 p-6">
    
                <ul>
    
                    <li class="mb-6">
                        <h1 class="font-semibold text-teal-600 mb-1">Efficient Distribution</h1>
                        <p class="text-gray-900">
                            One reason why we developed this platform was to help make distribution of resources an easier process. With this platform, lecturers or course representatives can easily upload course materials unto the platform without any difficulties.
                        </p>
                    </li>
    
                    <li class="mb-6">
                        <h1 class="font-semibold text-teal-600 mb-1">Easy Access</h1>
                        <p class="text-gray-900">
                            Easy access is anthoer resaon for developing this platform. Users which in most cases are students can access course materials on the platform without any limitation. The platform is an open-access platform; students can download course materials without the need for creating an account.
                            <br><br>
                            Also, the platform provides a section for downloading past examination papers which is very important to students especially when preparing for exminations. Students can download pdf copies of past examination papers so far as they have been uploaded unto the platform by any user.
                        </p>
                    </li>
    
                    <li class="mb-6">
                        <h1 class="font-semibold text-teal-600 mb-1">Online Repository</h1>
                        <p class="text-gray-900">
                            Another reason why this platform was developed was to create an online repository for the university at large. We wanted to help create an archive of digital resources for the university; a single point where people will seek when looking for digital resources like course materils and past examination papers
                        </p>
                    </li>
    
                </ul>
    
            </div>

        </div>


        <hr class="border-gray-500 my-12">


        <div class="grid lg:grid-cols-3 gap-6">

            <div class="mb-6">
                <h1 class="text-lg font-semibold">Developer</h1>
                <p>Here is the developer of {{ env('APP_NAME') }}</p>
            </div>

            <div class="lg:col-span-2">
                
                <div class="">

                    <div class="bg-gray-100 rounded-lg p-6">
                        <img src="{{ asset('img/developers/lee.jpg') }}" alt="" class="h-20 w-20 lg:h-40 lg:w-40 rounded-full mx-auto mb-4">
                        <div class="text-center">
                            <h6 class="font-semibold text-teal-600 tracking-widest">John Lee</h6>
                            <p class="">
                                <i class="fas fa-envelope"></i>
                                leejay0110@gmail.com
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>



    </div>







@endsection