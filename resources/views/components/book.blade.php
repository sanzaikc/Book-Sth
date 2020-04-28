<div class="rounded-lg shadow-md overflow-hidden border hover:bg-blue-100 transform hover:scale-105 transition-ease-in duration-150">
    <a href=" {{ route('books.show', $book) }} ">
        <img class="w-full h-64 object-contain" src= {{ $book->cover_img}}  alt="Sunset in the mountains">
    </a>
    <div class="px-4 py-2 border-t">
        <div class="font-bold text-xl mb-2">{{ Str::limit($book->title, 40) }}</div>
        <div class="flex">
            <div class="h-12 w-12 rounded-full overflow-hidden border-2">
                <img class="w-full" src="https://cdn3.iconfinder.com/data/icons/coronavirus-11/64/mask-wearing-avatar-man-covid19-coronavirus-air_pollution-512.png" alt="Sunset in the mountains">
            </div>
            <div class="ml-2 flex flex-col">
                <a class="hover:underline" href="#"> {{ $book->user->name }} </a>
                <small>Rs. 400</small>
            </div>
        </div>
    </div>
    <div class="px-4 py-2">
        @foreach ($book->categories as $cat)
            <span class="inline-block bg-gray-200 rounded-full px-1 text-sm font-semibold text-gray-700 mr-2">{{ $cat->name }}</span> 
        @endforeach
    </div>
</div>
