@extends('layouts.base')

@section(section: 'title', content: "Title from child")

@section('main')
    [Child]
    <div>
        @foreach ($posts as $post)
            <li>{{ $post }}</li>
        @endforeach
    </div>
    [Child]
@endsection