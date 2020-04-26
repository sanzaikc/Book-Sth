@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="mx-auto bg-white shadow rounded-sm border-t-4 border-blue-400" style="width: 560px">
        <div class="md:flex md:items-center mx-4 mb-6">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3"><h1 class="mt-6 font-bold text-2xl">Login</h1></div>
        </div>
        <form method="POST" action="{{ route('login') }}" class="px-4 py-6">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label for="email" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">{{ __('E-Mail Address') }}</label>
                </div>
                <div class="md:w-2/3">
                    <input id="email" type="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white @error('email') border-red-500 @else focus:border-blue-500 @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label for="password" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">{{ __('Password') }}</label>
                </div>
                <div class="md:w-2/3">
                    <input id="password" type="password" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white @error('password') border-red-500 @else focus:border-blue-500 @enderror" name="password" autocomplete="current-password">
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center m-4">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="font-bold text-gray-500" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="md:flex md:items-center mx-4 mb-6">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3 flex justify-between items-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Sign In
                </button>
                @if (Route::has('password.request'))
                    <a class="font-bold text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
