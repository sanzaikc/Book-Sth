@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg px-4 py-8 shadow-md">

        {{-- thread section --}}
        <div class="thread" x-data="{ replySection: false , editModal: false }">
            <div class="">
                <h2 class="font-semibold text-3xl"> {{ $thread->title }} </h2>
            </div>
            {{-- edit editModal  --}}
            <div x-show="editModal">
                <div
                    style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg z-50"
                >
                    <div class="container mx-auto w-1/2  rounded-lg ">
                        <div class="bg-white rounded p-2">
                            <div class="editModal">
                                <h2 class="text-2xl font-semibold mb-2">Edit your Thread</h2>
                                <form action="{{ route('threads.update', $thread) }}" method="post" class="flex flex-col items-end bg-gray-200 rounded-lg p-2">
                                    @csrf
                                    @method('PUT')
                                    <input name="title" type="text" class="w-full rounded-lg px-4 py-2" placeholder="Title of your query.." value=" {{ old('title', $thread->title) }}">
                                    <textarea name="body" class="w-full rounded-lg mt-2 p-4" placeholder="Describe your query.."> {{ old('title', $thread->body) }} </textarea>
                                    <div class="mt-2 text-sm">
                                        <button 
                                            type="button" 
                                            class="bg-white rounded-full focus:outline-none px-3 py-1 shadow-sm hover:bg-gray-300" 
                                            x-on:click="editModal = false"
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
                    </div>
                </div>
            </div>
            
            {{-- thread detail   --}}
            <div class="flex mt-4">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full  w-10 h-10"  >
                <div class="ml-3 w-full flex justify-between">
                    <div>
                        <h2 class="font-semibold text-xl"> {{ $thread->user->name }} </h2>
                        <p class="text-gray-500"> {{ $thread->created_at->diffForHumans()}} </p>
                    </div>
                    {{-- edit/delete  --}}
                    @can('update', $thread)
                        <div class="flex items-center">
                            <form action=" {{ route('threads.destroy', $thread) }} " method="post">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit"
                                    title="Delete this thread"
                                    class="text-red-500 focus:outline-none transform hover:scale-110 hover:text-red-500 transition-ease-in duration-150"
                                    onclick="confirm('Are you sure you want to delete?')"
                                    > <span class="flaticon-trash ml-3"></span>
                                </button >
                            </form>
                            <button 
                                title="Edit this thread"
                                class="focus:outline-none transform hover:scale-110 hover:text-blue-500 transition-ease-in duration-150"
                                x-on:click="editModal = true"
                                > <span class="flaticon-contract ml-3"></span>
                            </button >          
                        </div>     
                     @endcan
                </div>
               
            </div>

            <p class="mt-6 p-2 text-xl rounded bg-gray-100 "> {{ $thread->body }} </p>

            {{-- leave a reply  --}}
            <div class="flex items-center mt-6">
                <span class="flaticon-like text-blue-500"></span>
                <span class="ml-2 font-semibold "> {{ $thread->vote_count }} {{ Str::plural('like', $thread->vote_count) }} </span>
                @if (auth()->user())
                    <button 
                        type="button" 
                        class="ml-3 bg-blue-500 rounded-full text-white focus:outline-none shadow-sm px-3 py-1 hover:bg-blue-400"
                        x-on:click="replySection = true"
                        > Leave a reply
                    </button>
                @else
                    <a 
                        href="{{ route('login') }}" 
                        class="ml-3 bg-blue-500 rounded-full text-white focus:outline-none shadow-sm px-3 py-1 hover:bg-blue-400 hover:no-underline"
                        >Sign in to reply
                    </a>     
                @endif  
            </div> 

            {{-- reply form  --}}
            <div class="mt-3" x-show="replySection">
                <form action=" {{ route('threads.replies.store', $thread) }} " method="post" class="flex flex-col items-end bg-gray-200 rounded-lg p-2">
                    @csrf
                    <textarea name="body" class="w-full rounded-lg mt-2 p-4" placeholder="State your mind.."></textarea>
                    <div class="mt-2 text-sm">
                        <button 
                            type="button" 
                            class="bg-white rounded-full focus:outline-none px-3 py-1 shadow-sm hover:bg-gray-400" 
                            x-on:click="replySection = false"
                            > Cancel 
                        </button>
                        <button 
                            type="submit" 
                            class="bg-blue-500 rounded-full text-white  focus:outline-none ml-2 shadow-sm px-3 py-1  hover:bg-blue-400"
                            > Submit 
                        </button>
                    </div>
                </form>
            </div>

        </div>

        @include('replies._index')

    </div>
    
@endsection