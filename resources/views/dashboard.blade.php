@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 25rem">
            <div class="col-5 text-center">
                <h1 class="fw-light">WELCOME to <span class="text-danger fw-normal">My</span><span class="fw-bold">BLOG</span>
                </h1>
                <p class="fw-light fs-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde sit facere nulla
                    vitae ipsum obcaecati ab delectus repellendus impedit architecto amet.</p>
                <a href="/myblogs" class="btn btn-secondary">Add Blog</a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 py-3 border-bottom">
                    <span class="text-decoration-none fs-5 fw-bold">Newest Blogs</span>
                </div>
                <div class="col-6 text-end py-3 border-bottom">
                    <a href="/blogs" class="text-decoration-none fs-6 fw-bold">View All...</a>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-4 py-3">
                        <div class="card shadow" style="width: 100%; height:25rem">
                            <div class="rounded-top" style="height: 200px; width: 100%; overflow: hidden;">
                                <div
                                    style="height: 100%; width: 100%; background-image: url({{ $blog->url_image }}); background-size: cover; background-position: center center;">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-between py-1">
                                    <div class="col">
                                        <span class="fw-light text-secondary">By. {{ $blog->user->name }}</span>
                                    </div>
                                    <div class="col text-end">
                                        <span
                                            class="fw-light text-secondary">{{ $blog->updated_at->diffForhumans() }}</span>
                                    </div>
                                </div>
                                <h6 class="card-title">{{ $blog->title }}</h6>
                                <p class="card-text text-secondary">{{ substr($blog->body, 0, 100) }}...
                                </p>
                                <a href="/blogs/{{ $blog->id }}" class="text-decoration-none float-end">Read
                                    More...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
