<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Reply;
use Illuminate\Support\Facades\Validator;

class Replies extends Component
{   
    public $replies = [];
    public $reply;
    public $threadId;

    public function mount($threadId){
        $this->threadId = $threadId;
        $this->replies = Reply::where('thread_id', $threadId)->get();
    }

    public function add()
    {
        $this->validate(['reply' =>'required|max:255']);
        $newCreated= Reply::create([
            'user_id' => auth()->id(),
            'thread_id' => $this->threadId ,
            'body' => $this->reply
            ]);
        $this->replies->prepend($newCreated);
        $this->reply = "";
    }

    public function remove($replyId)
    {
        $reply = Reply::find($replyId);
        $reply->delete();
        $this->replies = $this->replies->where('id', '!=' , $replyId);

    }

    public function render()
    {
        return view('livewire.replies');
    }
}
