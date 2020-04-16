@extends('layouts.app')

@section('content')
    <div x-data="{ tab: 'all' }">
        
        {{-- ask question toggle  --}}
        <div class="" x-data="{ open: false }">
            <div class="flex justify-between">
                <h2 class="text-3xl font-semibold">Discussion Forum</h2>
                <button 
                    class="bg-blue-500 rounded-full text-white text-sm focus:outline-none px-3 shadow-sm hover:bg-blue-400"
                    x-on:click="open = true"
                    > Ask Question 
                </button>
            </div>
            <div 
                class="mt-3" 
                x-show="open"
                @click.away="open = false"
            >
                {{-- ask question form  --}}
                <form action="{{ route('threads.store') }}" method="post" class="flex flex-col items-end bg-gray-200 rounded-lg p-3">
                    @csrf
                    <input name="title" type="text" class="w-full rounded-lg px-4 py-2" placeholder="Title of your query..">
                    <textarea name="body" class="w-full rounded-lg mt-3 p-4" placeholder="Describe your query.."></textarea>
                    <div class="mt-3 text-sm">
                        <button 
                            type="submit" 
                            class="bg-blue-500 rounded-full text-white  focus:outline-none shadow-sm px-3 py-1  hover:bg-blue-400"
                            > Submit 
                        </button>
                        <button 
                            type="button" 
                            class="bg-gray-200 rounded-full focus:outline-none px-3 py-1 ml-2 shadow-sm  hover:bg-gray-300" 
                            x-on:click="open = false"
                            > Cancel 
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-4 bg-white rounded-lg ">
            {{-- question toggle buttons --}}
           <div class="flex">
                <button 
                    class="flex-1 text-xl bg-gray-100 rounded-b-lg" 
                    x-bind:class="{'bg-white inline-block rounded-t py-1 px-4 text-blue-500 font-semibold focus:outline-none': tab === 'all' }" 
                    x-on:click="tab = 'all'"
                    >All Questions
                </button>
                <button 
                    class="flex-1 text-xl bg-gray-100 rounded-b-lg" 
                    x-bind:class="{'bg-white inline-block rounded-t py-1 px-4 text-blue-500 font-semibold focus:outline-none': tab === 'users' }" 
                    x-on:click="tab = 'users'"
                    >My Question
                </button>
           </div>

           <div class="px-3">
               {{-- all threads  --}}
                <div x-show="tab === 'all'">
                    <x-thread-card :threads="$allThreads" />

                     <div class="flex justify-center mt-4">
                        {{ $allThreads->links() }}
                    </div>
                </div>

                {{-- user's thread  --}}
                <div x-show="tab === 'users'">

                    @if ($userThreads === "")
                       <div class="mx-auto">
                            <h1> Login First </h1>
                       </div>
                    @else
                        <x-thread-card :threads="$userThreads" />

                        <div class="flex justify-center mt-4">
                            {{ $userThreads->links() }}
                        </div>
                    @endif
                </div>
           </div>

        </div>

    </div>
@endsection