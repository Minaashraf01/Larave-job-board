@extends('layouts.app')
@section('title','My DRIVE | Add Drive')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">إضافة ملف جديد إلى My Drive</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('drive.add') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">اسم الملف</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="اكتب اسم الملف" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">وصف الملف</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="اكتب وصفًا مختصرًا" required>
                        </div>

                          <div class="mb-3">
                            <label for="description" class="form-label">رفع الملف</label>
                            <input type="file" class="form-control" name="fileUpload" id="file"  required>
                        </div>


                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">إضافة الملف</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('drive.showDrive') }}" class="btn btn-link">عرض الملفات</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
