 {{-- answers/comment section  --}}
 <div class="mt-12">
    <h2 class="font-semibold mb-3"> {{ $thread->reply_count }} {{ Str::plural('reply', $thread->reply_count) }} </h2>
    <hr>

    @foreach ($thread->replies as $reply)
        <div class="my-4">
            <div class="flex items-center">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10 h-10" >
                <div class="ml-3">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <h2 class="font-semibold"> {{ $reply->user->name }} </h2>
                            <span class="ml-3 text-green-500 bg-green-100 text-sm font-semibold rounded-full px-2 flex items-center "><span class="flaticon-best mr-2"></span> Best Reply </span>
                        </div>
                        @can('delete', $reply)
                            <form action=" {{ route('threads.replies.destroy', [$thread, $reply]) }} " method="post" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit"
                                    class="text-red-500 hover:no-underline transform hover:scale-110 hover:text-red-500"
                                    onclick="confirm('Are you sure you want to delete?')"
                                    > <span class="flaticon-trash ml-3"></span>
                                </button >
                            </form>
                        @endcan
                    </div>
                    <p class="text-gray-500"> {{ $reply->created_at->diffForHumans() }} </p>
                </div>
            </div>
            <p class="mt-6"> {{ $reply->body }} </p>
        </div>
        <hr>
    @endforeach
</div>