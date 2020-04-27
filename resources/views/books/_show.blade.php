@extends('layouts.app')

@section('content')
    <div class="w-100 mb-4 flex">
        <div class="w-2/3 flex flex-col">
            <div class="w-full mb-4 p-4 border rounded self-start">
                <img src="{{ $book->cover_img }}" alt="book" class="object-cover w-full" style="height: 60vh">
                <div class="mt-4 flex">
                    <img src="{{ $book->cover_img }}" alt="book" class="mr-4 object-cover h-24 w-24">
                    <img src="{{ $book->cover_img }}" alt="book" class="mr-4 object-cover h-24 w-24">
                    <img src="{{ $book->cover_img }}" alt="book" class="mr-4 object-cover h-24 w-24">
                </div>
            </div>
            <div class="p-4 flex flex-col border rounded">
                <div class="">
                    <h1 class="text-xl">Details</h1>
                    <div class="flex flex-wrap">
                        <div class="mb-2 w-1/2 flex">
                            <span class="text-gray-600 w-1/2">Name</span>
                            <span class="w-1/2">Null Brain</span>
                        </div>
                        <div class="mb-2 w-1/2 flex">
                            <span class="text-gray-600 w-1/2">Type</span>
                            <span class="w-1/2">Sell</span>
                        </div>
                        <div class="mb-2 w-1/2 flex">
                            <span class="text-gray-600 w-1/2">Price</span>
                            <span class="w-1/2">200</span>
                        </div>
                        <div class="mb-2 w-1/2 flex">
                            <span class="text-gray-600 w-1/2">Negotiable</span>
                            <span class="w-1/2">Yes</span>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="">
                    <h1 class="text-xl">Description</h1>
                    <p>{{$book->description}}</p>
                </div>
            </div>
        </div>
        <div class="ml-4 w-1/3 flex flex-col">
            <div class="mb-4 border rounded p-4">
                <h1 class="text-2xl">Null Brain</h1>
                <h1 class="text-xl">Rs. 230</h1>
                <p class="my-4 text-gray-700">
                    {{$book->description}}
                </p>
                <p class="flex justify-between items-center">
                    <span>Hetauda, Hupra</span>
                    <span>2019, May 10</span>
                </p>
            </div>
            <div class="border rounded p-4">
                <h1 class="text-xl mb-2">Seller Details</h1>
                <a href="#" class="inline-flex">
                    <div class="h-20 w-20 p-2 rounded-full overflow-hidden border-2">
                        <img class="w-full" src="https://cdn3.iconfinder.com/data/icons/coronavirus-11/64/mask-wearing-avatar-man-covid19-coronavirus-air_pollution-512.png" alt="Sunset in the mountains">
                    </div>
                    <div class="ml-4 flex flex-col">
                        <h1> {{ $book->user->name }} </h1>
                        <small>Joined 2019 June</small>
                    </div>
                </a>
                <button class="w-full mt-2 py-2 rounded bg-blue-500 text-white focus:outline-none hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105 hover:translate-y-1">Chat</button>
            </div>
        </div>  
    </div>
@endsection