@extends('layouts.app')
@section('title', 'My DRIVE | Blogs')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">All Blog Posts</h2>

    @forelse($posts as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-primary">{{ $post->title }}</h4>
                <h3 class="card-text text-muted"><h3>content:</h3>{{ $post->body }}</h3>
                <p class="card-text text-muted">By: {{ $post->author }}</p>
                <br>
                <a href="{{ route('post.comments', $post->id) }}" class="btn btn-outline-info btn-sm">
    View Comments
</a>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">No blog posts found.</div>
    @endforelse
</div>
{{ $posts->links() }}
@endsection
