@extends('layouts.app')
@section('title','My Drive | Show Files')
@section('content')

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Show Files</h4>
        <a href="{{ route('drive.addDrive') }}" class="btn btn-primary">add file new</a>
    </div>

    @if($drives->count())
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Image file</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drives as $drive)
                <tr>
                    <td>{{ $drive->id }}</td>
                    <td>{{ $drive->name }}</td>
                    <td>{{ $drive->description }}</td>
                    <td><img src="{{ asset('upload/' .$drive->file) }}" width="75" alt=""></td>
                    <td>
                        <a href="{{ route('drive.destroy', $drive->id) }}"
                           class="btn btn-sm btn-outline-danger">
                            delete
                        </a>
                        <a href="{{ route('drive.show', $drive->id) }}"
                           class="btn btn-sm btn-outline-success">
                            show
                        </a>
                        <a href="{{ route('drive.destroy', $drive->id) }}"
                           class="btn btn-sm btn-outline-warning">
                            edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-info text-center">
        لا توجد ملفات حتى الآن.
    </div>
    @endif
</div>

@endsection
