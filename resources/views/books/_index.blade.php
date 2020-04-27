@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-semibold">Available Books</h2> 
<div class="container flex flex-wrap">

    @for ($i = 0; $i < 8; $i++)
        <x-book img="https://edit.org/images/cat/book-covers-big-2019101610.jpg" />   
    @endfor

</div>
@endsection
