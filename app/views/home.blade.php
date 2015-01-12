@extends('templates.default')

@section('title')
    Home
@stop

@section('content')
    @if($posts->count())
        @foreach($posts as $post)
            <article>
                <h2><a href="{{ URL::route('post-show', $post->slug) }}">{{ $post->title }}</a></h2>
                <p>Published On: {{$post->created_at->diffForHumans()}}</p>
                {{ Markdown::parse(Str::limit(($post->body), 300))  }}
                <a href="{{ URL::route('post-show', $post->slug) }}">Read more &rarr;</a>
            </article>
        @endforeach
    @endif
@stop