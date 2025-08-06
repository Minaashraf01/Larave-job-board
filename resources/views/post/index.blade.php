@extends('layouts.app')
@section('title', 'My DRIVE | Blogs')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">All Blog Posts</h2>
   @if (session('success'))
    <style>
        .background-green {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>

    <div class="background-green">
        {{ session('success') }}
    </div>
@endif

      <a href="/blog/create" class="btn btn-outline-info btn-sm"> 
                     Create Post
                </a> 
                <hr>
    @forelse($posts as $post)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-primary">
                    <a href="/blog/{{ $post->id }}">{{ $post->title }}</a>
                </h4>
                <p class="card-text text-muted">By: {{ $post->author }}</p>
                <br>
                 <a href="" class="btn btn-outline-info btn-sm"> 
                    View Comments
                </a> 
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-warning btn-sm"> 
                     Edit 
                </a>
                <form method="post" action="/blog/{{ $post->id }}"  onsubmit="return confirm(' Are you sure delete?')">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">No blog posts found.</div>
    @endforelse
</div>
{{ $posts->links() }}
@endsection
