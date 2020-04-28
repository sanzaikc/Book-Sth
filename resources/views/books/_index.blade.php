@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="flex items-center justify-between" x-data="{ postModal: false }">
        <h2 class="text-3xl font-semibold">Books</h2> 
        <button 
            class="bg-blue-500 rounded-lg text-white text-sm focus:outline-none px-3 py-1 shadow-sm hover:bg-blue-400"
            x-on:click="postModal = true"
            > Post Book
        </button>

        {{-- post modal  --}}
        <div x-show="postModal">
            <div
                style="background-color: rgba(0, 0, 0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg z-50"
            >
                <div class="container mx-auto rounded-lg">
                    <div class="bg-white rounded p-2">
                        <div class="flex justify-between">
                            <h2 class="text-2xl font-semibold mb-2">Post Book</h2>  
                            <button x-on:click="postModal = false"> X </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="my-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-12">    
        @foreach ($books as $book)
            <x-book :book="$book" />     
        @endforeach
    </div>

</div>
@endsection
