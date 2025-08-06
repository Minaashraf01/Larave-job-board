@extends('layouts.app')
@section('title', 'My DRIVE | Create')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
        color: #444;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-group textarea {
        resize: vertical;
    }

    .form-group .note {
        font-size: 12px;
        color: #666;
        margin-top: 5px;
    }

    .checkbox-group {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 20px;
    }

    .checkbox-group input {
        margin-top: 5px;
    }

    .checkbox-group label {
        font-weight: normal;
        color: #333;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .form-actions button,
    .form-actions a {
        padding: 10px 20px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .form-actions button {
        background-color: #28a745;
        color: white;
    }

    .form-actions a {
        background-color: #dc3545;
        color: white;
    }

    .form-actions button:hover {
        background-color: #218838;
    }

    .form-actions a:hover {
        background-color: #c82333;
    }
</style>

<div class="form-container">
    <h2>Create New Post</h2>

    <form action="/blog" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ old('title') }}" name="title" id="title" >
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" value="{{ old('author') }}" name="author" id="author" >
            @error('author')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content"  name="body" rows="4" >{{ old('body') }}</textarea>
            @error('body')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <p class="note">Write a few sentences about the article.</p>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="published" name="published" checked>
            <label for="published">
                <strong>Is published?</strong><br>
                Do you want it published or saved as draft.
            </label>
        </div>

        <div class="form-actions">
            <button type="submit">Save</button>
            <a href="./">Cancel</a>
        </div>
    </form>
</div>
@endsection
