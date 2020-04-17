@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg px-4 py-8">
        {{-- thread section --}}
        <div class="thread" x-data="{ open: false }">
            <div class="flex justify-between">
                <h2 class="font-semibold text-3xl"> {{ $thread->title }} </h2>
                @can('update', $thread)
                    <div class="flex items-center">
                        <form class="form-delete" action=" {{ route('threads.destroy', $thread) }} " method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="bg-red-500 text-white rounded-full shadow-sm focus:outline-none px-2 hover:bg-red-400" onclick="confirm('Are you sure you want to delete?')" value="Delete">
                        </form>
                        <button class="bg-blue-500 text-white rounded-full shadow-sm focus:outline-none px-2 ml-2 hover:bg-blue-400">Edit</a >
                    </div>     
                @endcan
                    </div>
            <div class="flex mt-4">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10" >
                <div class="ml-3">
                    <h2 class="font-semibold"> {{ $thread->user->name }} </h2>
                    <p class="text-gray-500"> {{ $thread->created_at }} </p>
                </div>
            </div>

            <p class="mt-6"> {{ $thread->body }} </p>

            <div class="flex items-center mt-8">
                <span>Like icon</span>
                <span class="ml-3 font-semibold"> 10 likes </span>s
                <button 
                    type="button" 
                    class="ml-3 bg-blue-500 rounded-full text-white  focus:outline-none shadow-sm px-2  hover:bg-blue-400"
                    x-on:click="open = true"
                    > Leave a reply
                </button>
            </div> 

            {{-- leave comment  --}}
            <div class="mt-3" x-show="open">
                <form action="" method="post" class="flex flex-col items-end bg-gray-200 rounded-lg p-2">
                    @csrf
                    <textarea name="body" class="w-full rounded-lg mt-2 p-4" placeholder="State your mind.."></textarea>
                    <div class="mt-2 text-sm">
                        <button 
                            type="button" 
                            class="bg-white rounded-full focus:outline-none px-3 py-1 shadow-sm hover:bg-gray-400" 
                            x-on:click="open = false"
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

        {{-- answers/comment section  --}}
        <div class="mt-12">
            <h2 class="font-semibold mb-3">13 Replies</h2>
            <hr>
            @for ($i = 0; $i < 4; $i++)
            <div class="my-4">
                <div class="flex">
                    <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-green-500 rounded-full w-12" >
                    <div class="ml-3">
                        <div class="flex items-center">
                            <h2 class="font-semibold">Another Name</h2>
                            <span class="ml-3 text-green-500 bg-green-100 text-sm rounded-full px-2 py-1"> Best Reply </span>
                        </div>
                        <p class="text-gray-500">2 days ago</p>
                    </div>
                </div>
                <p class="mt-6"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit dolore amet quidem! Dolores magni magnam quaerat ab iure suscipit iusto?</p>
            </div>
            <hr>
            @endfor
        </div>
    </div>
@endsection