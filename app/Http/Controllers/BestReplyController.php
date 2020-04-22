<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class BestReplyController extends Controller
{
    public function __invoke(Reply $reply)
    {
        $reply->thread->acceptBestReply($reply);

        return back();
    }
}
