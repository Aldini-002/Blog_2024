@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 15rem">
            <div class="col-5 text-center">
                <h1 class="fw-light">ALL BLOGS</h1>
                <form action="/blogs">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="search content..."
                            aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-12 text-end py-3">
                    <a href="#" class="btn btn-outline-secondary">Filter</a>
                </div> --}}
                <div class="col-12 mt-5">
                    <section class="text-center">
                        <div class="card">
                            <div style="height: 300px; width: 100%; overflow: hidden;" class="rounded-top">
                                <div
                                    style="height: 100%; width: 100%; background-image: url({{ $blogs[0]->url_image }}); background-size: cover; background-position: center center;">
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $blogs[0]->title }}</h5>
                                <p class="card-text">
                                    <small class="text-body-secondary">By. {{ $blogs[0]->user->name }}</small>
                                    |
                                    <small class="text-body-secondary">{{ $blogs[0]->updated_at->diffForhumans() }}</small>
                                </p>
                                <p class="card-text text-secondary">{{ substr($blogs[0]->body, 0, 250) }}...</p>
                                <hr class="border-bottom border-dark" />
                                <div class="d-flex justify-content-center">
                                    <a href="/blogs/{{ $blogs[0]->id }}" class="text-decoration-none">Read
                                        More...</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                @foreach ($blogs->skip(1) as $blog)
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

                <div class="col-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
