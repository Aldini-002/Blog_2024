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
                            <form action="/blogs/{{ $blog->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="">Title<span class="text-danger fw-light">*</span></label>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="title" id="title"
                                            class="form-control text-secondary" autocomplete="off" required
                                            value="{{ $blog->title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="">Body<span class="text-danger fw-light">*</span></label>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="body" class="form-control text-secondary" id="body" rows="10" required>{{ str_replace('<br />', '', $blog->body) }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="">Picture</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="file" name="image" id="image" class="form-control">
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

Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum nemo quae at suscipit iure ipsam expedita molestias
voluptate qui accusantium fugiat alias illum eum quam est corrupti dolorem quidem, reprehenderit maxime quia optio quasi
asperiores totam. Ab ratione, explicabo minus necessitatibus, quidem quasi esse cumque in enim, nostrum repellendus
deserunt.

Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quidem modi a labore non, ea aperiam quam dolor
placeat neque.

Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate aliquid praesentium molestias, impedit inventore
culpa delectus rerum adipisci cum doloremque expedita officiis numquam recusandae error fugit ratione, repellat ea
sapiente.
