@extends('layouts.app')


@section('content')


    <div class="max-w-screen-lg mx-auto px-4 py-12">


        <div class="rounded-lg bg-gray-100 p-6 mb-12">
            <h1 class="text-xl font-semibold uppercase tracking-widest mb-3">KTU Repo</h1> 
            <p class="mb-3">
                Hello there and welcome to KTU Repo. <br>
                The digital repository of Koforidua Technical University. <br>
                To know more about this platform, please click on the link below.
            </p>
            <a href="{{ route('about') }}" class="text-blue-600 font-semibold">Read more</a>
        </div>


        <div class="grid lg:grid-cols-2 gap-12">
            <div class="bg-gray-100 rounded-lg p-6">
                <img src="{{ asset('img/passco.jpg') }}" alt="" class="h-24 w-24 lg:h-32 lg:w-32 rounded-full mx-auto mb-4">
                <div class="text-center">
                    <a href="{{ route('papers') }}" class="font-semibold text-blue-600">Past Examination Papers</a>
                    <p>Download PDFs of past examination papers.</p>
                </div>
            </div>
            <div class="bg-gray-100 rounded-lg p-6">
                <img src="{{ asset('img/material.jpg') }}" alt="" class="h-24 w-24 lg:h-32 lg:w-32 rounded-full mx-auto mb-4">
                <div class="text-center">
                    <a href="{{ route('materials') }}" class="font-semibold text-blue-600">Course Materials</a>
                    <p>Download course materials.</p>
                </div>
            </div>
        </div>


    </div>





@endsection