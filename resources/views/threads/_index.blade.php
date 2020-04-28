@extends('layouts.app')

@section('content')
    <div x-data="{ tab: 'all' }" class="">
        
        {{-- ask question toggle  --}}
        <div class="" x-data="{ open: false }">
            <div class="flex items-center justify-between">
                <h2 class="text-3xl font-semibold">Discussion Forum</h2> 
                <i class="fa fa-user"></i>
                @if (auth()->user())
                    <button 
                        class="bg-blue-500 rounded-full text-white text-sm focus:outline-none px-3 py-1 shadow-sm  hover:bg-blue-400"
                        x-on:click="open = true"
                        > Start a thread
                    </button>  
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="bg-blue-500 rounded-full text-white focus:outline-none shadow-sm px-3 py-1 hover:bg-blue-400 hover:no-underline"
                        >Start a thread ?
                    </a> 
                @endif
            </div>

            <div 
                class="my-3" 
                x-show="open"
                @click.away="open = false"
            >
                {{-- ask question form  --}}
                <form action="{{ route('threads.store') }}" method="post" class="flex flex-col items-end bg-gray-200 rounded-lg p-2">
                    @csrf
                    <input name="title" type="text" class="w-full rounded-lg px-4 py-2" placeholder="Title of your query..">
                    <textarea name="body" class="w-full rounded-lg mt-2 p-4" placeholder="Describe your query.."></textarea>
                    <div class="mt-2 text-sm">
                        <button 
                            type="button" 
                            class="bg-white rounded-full focus:outline-none px-3 py-1 shadow-sm hover:bg-gray-300" 
                            x-on:click="open = false"
                            > Cancel 
                        </button>
                        <button 
                            type="submit" 
                            class="bg-blue-500 rounded-full text-white  focus:outline-none shadow-sm px-3 py-1 ml-2 hover:bg-blue-400"
                            > Submit 
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="my-3 rounded-lg">
            {{-- question toggle buttons --}}
           <div class="flex">
                <button 
                    class="flex-1 text-xl" 
                    x-bind:class="{'bg-white inline-block py-1 px-4 rounded-t-lg text-blue-500 font-semibold focus:outline-none': tab === 'all' }" 
                    x-on:click="tab = 'all'"
                    >All Threads
                </button>
                <button 
                    class="flex-1 text-xl bg-none" 
                    x-bind:class="{'bg-white inline-block py-1 px-4 rounded-t text-blue-500 font-semibold focus:outline-none': tab === 'users' }" 
                    x-on:click="tab = 'users'"
                    >My Threads
                </button>
           </div>

           {{-- thread section --}}
           <div class="px-3 py-3 bg-white shadow-md">
               {{-- all threads  --}}
                <div x-show="tab === 'all'">

                    @foreach ($threads as $thread)  
                        <x-thread-card :thread="$thread" />
                    @endforeach

                     <div class="flex justify-center mt-4">
                        {{ $threads->links() }}
                    </div>
                </div>

                {{-- user's thread  --}}
                <div x-show="tab === 'users'">             
                    @if (auth()->user())
                      @if ( auth()->user()->threads->isEmpty() )
                          You havenot started any threads, yet!
                      @else

                        @foreach (auth()->user()->threads as $thread)  
                            <x-thread-card :thread="$thread" />   
                        @endforeach

                      @endif
                    @else
                        <div class="flex flex-col justify-center items-center p-4 rounded-lg">
                            <h2 class="text-2xl font-semibold mb-2">You Need to Login First</h2>
                            <a href="{{ route('login') }}" class="text-xl text-white bg-blue-500 px-4 py-1 rounded-full hover:no-underline hover:bg-blue-400" > Login </a>
                        </div>
                     @endif               
                </div>
           </div>

        </div>

    </div>
@endsection