@extends('layouts.main')
@section('content')
    <div class="container mt-5 py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-5 text-center">
                <h1 class="fw-light">ADD BLOG</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12 mt-3">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="fw-light">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 my-3">
                            <form action="/blogs" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="">Title<span class="text-danger fw-light">*</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="title" id="title"
                                            class="form-control text-secondary" autocomplete="off" required
                                            value="{{ old('title') }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="">Body<span class="text-danger fw-light">*</span></label>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="body" class="form-control text-secondary" id="body" rows="10" required>{{ old('body') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="">Picture<span class="text-danger fw-light">*</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="file" name="image" id="image" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12 d-flex justify-content-end gap-1">
                                        <a href="/myblogs" class="btn btn-dark">Back</a>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
