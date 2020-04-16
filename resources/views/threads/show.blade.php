@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg px-4 py-8">
        {{-- thread section --}}
        <div class="thread">
            <h2 class="font-semibold text-3xl"> {{ $thread->title }} </h2>
            <div class="flex mt-4">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10" >
                <div class="ml-3">
                    <h2 class="font-semibold"> {{ $thread->user->name }} </h2>
                    <p class="text-gray-400"> {{ $thread->created_at }} </p>
                </div>
            </div>

            <p class="mt-6"> {{ $thread->body }} </p>

            <div class="flex items-center mt-8">
                <span>Like icon</span>
                <span class="ml-3 font-semibold"> 10 likes </span>
            </div>

        </div>



        {{-- answers/comment section  --}}
        <div class="mt-12">
            <h2 class="font-semibold mb-3">13 Answers</h2>
            <hr>
            @for ($i = 0; $i < 4; $i++)
            <div class="my-4">
                <div class="flex">
                    <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-green-500 rounded-full w-12" >
                    <div class="ml-3">
                        <div class="flex items-center">
                            <h2 class="font-semibold">Another Name</h2>
                            <span class="ml-3 text-green-500 bg-green-100 text-sm rounded-full px-2 py-1"> Best Answers</span>
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