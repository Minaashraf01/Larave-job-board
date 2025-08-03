@extends('layouts.app')
@section('title', 'My DRIVE | Tags')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">All Tags</h2>

    @forelse($tags as $tag)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h4 class="card-title text-primary">{{ $tag->title }}</h4>
                <br>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">No blog posts found.</div>
    @endforelse
</div>
@endsection
