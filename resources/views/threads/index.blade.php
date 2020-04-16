@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex" x-data="{ tab: 'allQuestion' }">
        
        <div class="sidebar w-64">
            @include('_side-bar')
        </div>

        <div class="threads ml-16 " x-show="tab === 'allQuestion'">
            @include('_all-threads')
        </div>

        <div x-show="tab === 'myQuestion'">
            Another Tab
        </div>

    </div>
@endsection