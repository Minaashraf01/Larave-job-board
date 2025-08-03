@extends('layouts.app')
@section('title','MyDrive| Show file')
@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Details file</h5>
                </div>

                <div class="card-body">
                    <h5 class="mb-3"><strong>name:</strong> {{ $drives->name }}</h5>

                    <p class="mb-3"><strong>description:</strong> {{ $drives->description }}</p>

                    <div class="mb-3">
                        <strong>file image:</strong><br>
                        @if(Str::endsWith($drives->file, ['.jpg', '.jpeg', '.png', '.gif']))
                            <img src="{{ asset('upload/' . $drives->file) }}" class="img-fluid rounded shadow-sm mt-2" alt="صورة الملف">
                        @elseif(Str::endsWith($drives->file, ['.pdf']))
                            <a href="{{ asset('upload/' . $drives->file) }}" target="_blank" class="btn btn-outline-secondary mt-2">
                                عرض الملف PDF
                            </a>
                        @else
                            <a href="{{ asset('upload/' . $drives->file) }}" target="_blank" class="btn btn-outline-primary mt-2">
                                تحميل الملف
                            </a>
                        @endif
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('drive.showDrive') }}" class="btn btn-secondary">رجوع للقائمة</a>

                    <div>

                        <form action="{{ route('drive.destroy', $drives->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل تريد حذف هذا الملف؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
