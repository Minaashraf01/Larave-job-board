@extends('layouts.app')
@section('title', 'My DRIVE | Blogs')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Show Post: {{ $post->title }}</h2>

    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <p class="card-text text-muted">By: {{ $post->author }}</p>
            <p class="card-text text-muted">Content: {{ $post->body }}</p>
        </div>
    </div>

    <!-- Comment Form -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Leave a Comment</h5>
        </div>
        <div class="card-body">
            <form action="/comment" method="POST">
                @csrf
                <input type="hidden" value="{{ $post->id }}" name="post_id">
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input 
                        type="text" 
                        class="form-control @error('author') is-invalid @enderror" 
                        id="author" 
                        name="author" 
                        value="{{ old('author') }}" 
                        placeholder="Enter your name">
                    @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Comment</label>
                    <textarea 
                        class="form-control @error('content') is-invalid @enderror" 
                        id="content" 
                        name="content" 
                        rows="3" 
                        placeholder="Write your comment here...">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
            <hr>
                <h2 class="mb-4">Show Comments:</h2>
            @foreach ( $post->comments as $commnet )
            <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <p class="card-text text-muted">By: {{ $commnet->author }}</p>
            <p class="card-text text-muted">Content: {{ $commnet->content }}</p>
        </div>
    </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
