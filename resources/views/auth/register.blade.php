@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="mx-auto bg-white shadow rounded-sm border-t-4 border-blue-400" style="width: 560px">
        <div class="md:flex md:items-center mx-4 mb-6">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3"><h1 class="mt-6 font-bold text-2xl">Register</h1></div>
        </div>
        <form method="POST" action="{{ route('register') }}" class="px-4 pb-6">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                        Full Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="name" type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white @error('name') border-red-500 @else focus:border-blue-500 @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
                        Email
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="email" type="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white @error('email') border-red-500 @else focus:border-blue-500 @enderror" name="email" value="{{ old('email') }}" autocomplete="name" autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
                        Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="password" type="password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white @error('password') border-red-500 @else focus:border-blue-500 @enderror" name="password" autocomplete="new-password">
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password-confirm">
                        Confirm Password
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input id="password-confirm" type="password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" name="password_confirmation" autocomplete="new-password">
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button class="w-100 shadow bg-blue-500 hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Sign Up
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
