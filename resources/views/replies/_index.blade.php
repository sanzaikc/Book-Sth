 {{-- answers/comment section  --}}
 <div class="mt-12">
    <h2 class="font-semibold mb-3"> {{ $thread->reply_count }} {{ Str::plural('reply', $thread->reply_count) }} </h2>
    <hr>

    @foreach ($thread->replies as $reply)
        <div class="my-4">
            <div class="flex items-center">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10 h-10" >
                <div class="ml-3 w-full text-sm">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <h2 class="font-semibold"> {{ $reply->user->name }} </h2>

                            @if ($reply->thread->best_reply_id == $reply->id)
                                <span class="ml-3 text-green-500 bg-green-200 font-semibold rounded-full px-3 flex items-center "><span class="flaticon-best mr-1"></span> Best Reply </span>
                            @endif
                            
                        </div>

                        <div class="flex">
                            {{-- best answer button  --}}
                            @can('update', $thread)
                            <form action=" {{ route('bestAnswer', $reply) }} " method="POST">
                                @csrf
                                @method('HEAD')
                                <button 
                                    type="submit" 
                                    class="mr-2 transform hover:scale-110 hover:text-green-500 cursor-pointer" 
                                    title="Mark as best reply"
                                    >
                                        <span class="flaticon-best"></span>                              
                                </button>
                            </form>
                        @endcan

                        {{-- delete button  --}}
                        @can('delete', $reply)  
                            <form action=" {{ route('threads.replies.destroy', [$thread, $reply]) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button 
                                type="submit"
                                class="text-red-500 transform hover:scale-110 hover:text-red-500"
                                onclick="confirm('Are you sure you want to delete?')"
                                > 
                                    <span class="flaticon-trash ml-3"></span>
                            </button >
                        </form>
                        @endcan
                    </div>
                    </div>
                    <p class="text-gray-500"> {{ $reply->created_at->diffForHumans() }} </p>
                </div>
            </div>
            <p class="mt-6"> {{ $reply->body }} </p>
        </div>
        <hr>
    @endforeach
</div>