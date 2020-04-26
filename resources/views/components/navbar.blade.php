<div>
    <nav class="bg-white border-b py-1">
        <div class="container mx-auto">
            <ul class="h-12 flex items-center">
                <li>
                    <a class="text-2xl my-auto" href="{{ url('/') }}">
                        Bookish
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="ml-auto">
                        <a class="text-gray-600 hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="ml-4">
                            <a class="text-gray-600 hover:underline"  href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <div class="ml-auto dropdown inline-block relative">
                        <button class="text-gray-700 font-semibold inline-flex items-center focus:outline-none">
                            <span class="mr-1">{{ Auth::user()->name }}</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="w-40 dropdown-menu bg-white rounded border shadow absolute right-0 hidden text-gray-700 py-1">
                            <li class="">
                                <a class="hover:bg-gray-200 py-1 px-2 block whitespace-no-wrap cursor-pointer">
                                   Settings
                                </a>
                            </li>
                            <hr/>
                            <li class="">
                                <a class="hover:bg-gray-200 py-1 px-2 block whitespace-no-wrap" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </ul>
        </div>
    </nav>
</div>


