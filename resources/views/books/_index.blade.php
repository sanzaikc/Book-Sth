@extends('layouts.app')

@section('content')
<div class="container flex" x-data="{ postModal: false }">
    <x-sidebar />
    <div x-show="postModal">
        <div
            style="background-color: rgba(0, 0, 0, .5);"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg z-50"
        >
            <div class="container mx-auto rounded-lg">
                <div class="bg-white rounded p-4">
                    <div class="w-2/3 mx-auto mb-2 flex justify-between">
                        <h2 class="text-2xl font-semibold mb-2">Register Book</h2>
                        <button x-on:click="postModal = false"> X </button>
                    </div>
                    <div class="w-2/3 mx-auto">
                        <form class="w-full">
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                                        Book title
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" type="text" name="title">
                                    <p class="text-red-500 text-xs italic">Error Here</p>
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image">
                                        Image
                                    </label>
                                    <input class="" id="image" type="file">
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
                                        Description
                                    </label>
                                    <textarea class="resize-none w-full h-20 p-2 border rounded bg-gray-200 focus:bg-white focus:outline-none focus:border-gray-500"></textarea>
                                    <p class="text-red-500 text-xs italic">Error Here</p>
                                </div>
                            </div>
{{--                            <div class="flex flex-wrap -mx-3 mb-2">--}}
{{--                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">--}}
{{--                                        City--}}
{{--                                    </label>--}}
{{--                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">--}}
{{--                                </div>--}}
{{--                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">--}}
{{--                                        State--}}
{{--                                    </label>--}}
{{--                                    <div class="relative">--}}
{{--                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">--}}
{{--                                            <option>New Mexico</option>--}}
{{--                                            <option>Missouri</option>--}}
{{--                                            <option>Texas</option>--}}
{{--                                        </select>--}}
{{--                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">--}}
{{--                                        Zip--}}
{{--                                    </label>--}}
{{--                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="flex justify-end">
                                <button class="px-4 py-2 bg-blue-500 text-white rounded focus:outline-none transition-transform duration-300 ease-in-out transform hover:scale-110">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
        @foreach ($books as $book)
            <x-book :book="$book" />
        @endforeach
    </div>

</div>
@endsection
