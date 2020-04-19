<?php

namespace App\Http\Controllers;

use Auth;
use App\Thread;
use Illuminate\Http\Request;
use App\Http\Requests\StoreThread;


class ThreadController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::latest()->paginate(10);
        
        
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThread $request)
    {
        $request->user()->threads()->create($request->all());

        return back()->with('toast_success', 'Thread Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        $thread->increment('views');
        
        return view('threads.show', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTHread $request, Thread $thread)
    {
        if(auth()->user()->cant('update', $thread)){
            abort(401);
        }else{
            $thread->update($request->only('title','body'));
            return back()->with('toast_info', 'Thread Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        if(auth()->user()->cant('delete', $thread)){
            abort(401);
        }else{
            $thread->delete();
            return redirect()->route('threads.index')->with('toast_info', 'Thread Deleted Successfully!');
        }
    }
}
