<div>
    @foreach ($threads as $thread)  
    <div class="my-2 p-3 rounded-lg hover:bg-gray-100">
        <div class="flex mb-1" >
            <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10 h-10" >
            <a href="{{ route('threads.show', $thread) }}" class="ml-2 text-xl font-bold hover:no-underline"> {{ $thread->title }} </a>
            </div>
            <div class="text-gray-500">
                asked {{ $thread->created_at->diffForHumans() }} by 
            <span class="text-blue-400">{{ $thread->user->name }}</span>
        </div>
        <div class="flex justify-between mt-3">
            {{-- upvote and downvote --}}
            <div class="flex items-center font-semibold">
                <a href="" class="hover:no-underline transform hover:scale-110" title="like">
                    <span class="flaticon-like-1"></span>
                </a>
                <a href="" class="hover:no-underline transform hover:scale-110" title="dislike">
                    <span class="flaticon-dislike-1 ml-3"></span>
                </a>
            </div>
            {{-- votes, answers and views --}}
            <div>
                <span class="text-gray-500 px-2 rounded"> {{ $thread->votes }} {{ Str::plural('vote', $thread->votes) }} </span>
                <span class="text-gray-500 px-2 rounded ml-12 {{ $thread->best_answer }} "> {{ $thread->replies }} {{ Str::plural('reply', $thread->replies) }} </span>
                <span class="text-gray-500 px-2 rounded ml-12"> {{ $thread->views }} {{ Str::plural('view', $thread->views) }} </span>
            </div>
        </div>
    </div>
    <hr>
    @endforeach
</div>