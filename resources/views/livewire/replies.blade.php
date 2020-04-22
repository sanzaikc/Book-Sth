<div>
    <div x-data="{ replySection: false  }">
        {{-- leave a reply  --}}
        <div class="flex items-center mt-6">
            <span class="flaticon-like text-blue-500 font-bold"></span>
            <span class="ml-3 font-semibold "> {{ $thread->vote_count  }}  {{ Str::plural('like', $thread->vote_count) }} </span>
            <button 
                type="button" 
                class="ml-3 bg-blue-500 rounded-full text-white  focus:outline-none shadow-sm px-2 py-1   hover:bg-blue-400"
                x-on:click="replySection = true"
                > Leave a reply
            </button>
        </div> 

        {{-- reply form  --}}
        <div class="mt-3" x-show="replySection" >
        <div class="flex flex-col items-end bg-gray-200 rounded-lg p-2">
            <textarea name="body" class="w-full rounded-lg mt-2 p-4" placeholder="State your mind.." wire:model="reply"></textarea>
            <div class="mt-2 text-sm">
                <button 
                    type="button" 
                    class="bg-white rounded-full focus:outline-none px-3 py-1 shadow-sm hover:bg-gray-400" 
                    x-on:click="replySection = false"
                    > Cancel 
                </button>
                <button 
                    type="button" 
                    class="bg-blue-500 rounded-full text-white  focus:outline-none ml-2 shadow-sm px-3 py-1  hover:bg-blue-400"
                    wire:click="addReply"
                    > Submit 
                </button>
            </div>
        </div>
        </div>
    </div>

    {{-- answers/comment section  --}}
    <div class="mt-12">
        <h2 class="font-semibold mb-3"> {{ $thread->reply_count }} {{ Str::plural('reply', $thread->reply_count) }} </h2>
        <hr>

    @foreach ($replies as $reply)
        <div class="my-4">
            <div class="flex items-center">
                <img src="{{ asset('img/funnyM.jpeg') }}" alt="avatar" class="border-2 border-blue-500 rounded-full w-10 h-10" >
                <div class="ml-3">
                    <div class="flex items-center justify-between">
                        <h2 class="font-semibold text-xl">{{ $reply->user->name }}</h2>
                        <span class="ml-3 text-green-500 bg-green-100 text-sm font-semibold rounded-full px-2 flex items-center "><span class="flaticon-best mr-2"></span> Best Reply </span>
                        <button 
                            class="bg-red-500 rounded-full text-white  focus:outline-none ml-2 shadow-sm px-3 py-1  hover:bg-red-400"
                            wire:click="deleteReply({{ $reply->id }})"
                        > Delete 
                        </button>
                    </div>
                    <p class="text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <p class="mt-6"> {{ $reply->body }} </p>
        </div>
        <hr>
    @endforeach
    </div>
    
</div>
    
