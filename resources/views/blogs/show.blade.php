@extends('layouts.main')
@section('content')
    <div class="container mt-5 py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-5 text-center">
                <h1 class="fw-light">{{ $blog->title }}</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 mb-3 mt-5">
                    <div style="height: 300px; width: 100%; overflow: hidden;" class="rounded">
                        <div
                            style="height: 100%; width: 100%; background-image: url({{ $blog->url_image }}); background-size: cover; background-position: center center;">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h1 class="fs-3">{{ $blog->title }}</h1>
                    <div class="text-secondary">By. {{ $blog->user->name }} | {{ $blog->updated_at->diffForhumans() }}
                    </div>
                    <p class="my-3 text-secondary">
                        {!! $blog->body !!}
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-end gap-1 mb-3">
                    <a href="/blogs" class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
