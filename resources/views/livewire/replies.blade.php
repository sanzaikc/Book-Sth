<div class="mt-12" x-data="{ replySection: false }">
    <d class="flex items-center">
        <h2 class="font-semibold"> {{ $replies->count() }} {{ Str::plural('reply', $replies->count()) }} </h2>
        {{-- leave a reply  --}}
        <div class="flex items-center">
            @if (auth()->user())
                <button 
                    type="button" 
                    class="ml-3 bg-blue-500 rounded-full text-white focus:outline-none shadow-sm px-3 py-1 hover:bg-blue-400"
                    x-on:click="replySection = true"
                    > Leave a reply
                </button>
            @else
                <a 
                    href="{{ route('login') }}" 
                    class="ml-3 bg-blue-500 rounded-full text-white focus:outline-none shadow-sm px-3 py-1 hover:bg-blue-400 hover:no-underline"
                    >Sign in to reply
                </a>     
            @endif  
        </div> 
    </div>

    {{-- reply form  --}}
    <div class="my-3" x-show="replySection">
        <form wire:submit.prevent="save" class="flex flex-col items-end bg-gray-200 rounded-lg p-2">
            {{ $newReply }}
            <input 
                type="text" 
                wire:model="newReply"
                class="w-full rounded-lg mt-2 p-4" 
                placeholder="State your mind.."
            >
            <div class="mt-2 text-sm">
                <button 
                    type="button" 
                    class="bg-white rounded-full focus:outline-none px-3 py-1 shadow-sm hover:bg-gray-400" 
                    x-on:click="replySection = false"
                    > Cancel 
                </button>
                <button 
                    type="submit"
                    class="bg-blue-500 rounded-full text-white  focus:outline-none ml-2 shadow-sm px-3 py-1  hover:bg-blue-400"
                    > Submit 
                </button>
            </div>
        </form>
    </div>

    <hr>

    @foreach ($replies as $reply)
        <div class="my-6">
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
                            @can('update', $reply->thread)
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
                                <button 
                                    type="submit"
                                    title="Delete reply"
                                    class="text-red-500 transform hover:scale-110 hover:text-red-500 transition-ease-in duration-150"
                                    {{-- onclick="confirm('Are you sure you want to delete?')" --}}
                                    wire:click="deleteReply( {{ $reply->id }} )"
                                    > 
                                    <span class="flaticon-trash ml-3"></span>
                                </button>
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
