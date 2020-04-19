@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg px-4 py-8">

        {{-- thread section --}}
        <div class="thread" x-data="{ open: false , modal: false }">
            {{-- edit/delete  --}}
            <div class="flex justify-between">
                <h2 class="font-semibold text-3xl"> {{ $thread->title }} </h2>
                @can('update', $thread)
                    <div class="flex items-center">
                        <form class="form-delete" action=" {{ route('threads.destroy', $thread) }} " method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="bg-red-500 text-white rounded-full shadow-sm focus:outline-none px-3 py-1 hover:bg-red-400" onclick="confirm('Are you sure you want to delete?')" value="Delete">
                        </form>
                        <button 
                            class="bg-blue-500 text-white rounded-full shadow-sm focus:outline-none px-3 py-1 ml-2 hover:bg-blue-400"
                            x-on:click="modal = true"
                            >Edit
                        </button >
                    </div>     
                @endcan
            </div>

            {{-- edit modal  --}}
            <div x-show="modal">
                <div
                    style="background-color: rgba(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                >
                    <div class="container mx-auto w-1/2  rounded-lg overflow-y-auto">
                        <div class="bg-white rounded">
                            <div class="modal-body">
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
                                            x-on:click="modal = false"
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
                <div class="ml-3">
                    <h2 class="font-semibold text-xl"> {{ $thread->user->name }} </h2>
                    <p class="text-gray-500"> {{ $thread->created_at }} </p>
                </div>
            </div>

            <p class="mt-6 rounded bg-gray-100 p-2"> {{ $thread->body }} </p>

            {{-- leave a reply  --}}
            <div class="flex items-center mt-6">
                <span class="flaticon-like text-blue-500 font-bold"></span>
                <span class="ml-3 font-semibold "> 10 likes </span>
                <button 
                    type="button" 
                    class="ml-3 bg-blue-500 rounded-full text-white  focus:outline-none shadow-sm px-2 py-1   hover:bg-blue-400"
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
                <div class="flex items-center">
                    <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10 h-10" >
                    <div class="ml-3">
                        <div class="flex items-center">
                            <h2 class="font-semibold text-xl">Another Name</h2>
                            <span class="ml-3 text-green-500 bg-green-100 text-sm font-semibold rounded-full px-2 flex items-center "><span class="flaticon-best mr-2"></span> Best Reply </span>
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