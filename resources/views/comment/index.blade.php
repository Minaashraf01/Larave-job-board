@extends('layouts.app')

@section('title', 'Comments for: ' . $post->title)

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Comments for: <span class="text-primary">{{ $post->title }}</span></h2>

    @forelse($comments as $comment)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-primary">Author: {{ $comment->author }}</h5>
                <p class="card-text">{{ $comment->content }}</p>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No comments found for this post.</div>
    @endforelse

    <a href="{{ route('post.index') }}" class="btn btn-secondary mt-3">← Back to All Posts</a>
</div>
@endsection
