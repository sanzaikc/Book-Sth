@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-semibold">Available Books</h2> 
<div class="container flex flex-wrap">
    @foreach ($books as $book)
        <x-book :book="$book" />     
    @endforeach
</div>
@endsection
