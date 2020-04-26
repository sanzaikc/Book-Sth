 {{-- answers/comment section  --}}
 <div class="mt-12">
    <h2 class="font-semibold mb-3"> {{ $thread->reply_count }} {{ Str::plural('reply', $thread->reply_count) }} </h2>
    <hr>

    @foreach ($thread->replies as $reply)
        <div class="my-4">
            <div class="flex items-center">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-8 h-8" >
                <div class="ml-3 w-full text-sm">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <h2 class="font-semibold"> {{ $reply->user->name }} </h2>
                            <p class="text-gray-500 ml-2"> {{ $reply->created_at->diffForHumans() }} </p>


                            @if ($reply->thread->best_reply_id == $reply->id)
                                <span class="ml-3 bg-green-500 text-yellow-400 rounded-full px-2 shadow-md transform hover:scale-110 transition-ease-in duration-150" title="Best Reply"><span class="flaticon-best"></span></span>
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
                                        class="mr-2 transform hover:scale-110 hover:text-green-500 cursor-pointer transition-ease-in duration-150" 
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
                                        title="Delete reply"
                                        class="text-red-500 transform hover:scale-110 hover:text-red-500 transition-ease-in duration-150"
                                        onclick="confirm('Are you sure you want to delete?')"
                                        > 
                                        <span class="flaticon-trash ml-3"></span>
                                    </button>
                                </form>
                            @endcan
                         </div>
                    </div>
                </div>
            </div>
            <p class="mt-2 p-2  text-xl bg-gray-100 rounded"> {{ $reply->body }} </p>
        </div>
        <hr>
    @endforeach
</div>