@extends('layouts.app')

@section('content')

        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
        </ol>
        </nav>

        @auth
        <a class="btn btn-dark my-2" href="{{ route('posts.create') }}">Create Post</a>
        @endauth

        <h1>{{$category->name}}</h1>

        @if (count($posts) === 0)
            <div class="row border my-2 p-2 no-gutters">
                No posts found in this category.
            </div>
        @else
            @foreach($posts as $post)
                <div class="row border my-2 p-2 no-gutters">
                    <div class="col-3 col-lg-4">
                        <a href="{{route('posts.show', $post)}}">
                            <h1>{{$post->title}}</h1>
                        </a>
                    </div>
                    <div class="col-3 col-lg-4">
                        by {{$post->user->username}} at {{ $post->created_at->format('d.m.Y H:i:s') }}
                    </div>
                    <div class="col-3 col-lg-2">
                        {{$post->reply_count}} Replies
                    </div>
                </div>
            @endforeach
        @endif


@endsection
