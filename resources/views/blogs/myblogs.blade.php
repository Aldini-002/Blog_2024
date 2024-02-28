@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center" style="height: 15rem">
            <div class="col-5 text-center">
                <h1 class="fw-light">MY BLOGS</h1>
                <form action="">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="search content..."
                            aria-describedby="button-addon2">
                        <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-end py-3">
                    <a href="#" class="btn btn-outline-secondary">Filter</a>
                </div>

                <div class="col-12">
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

                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Created By</th>
                                <th scope="col" class="text-end">Last Update</th>
                                <th scope="col" class="text-end">
                                    <a href="/blogs/create" class="btn btn-sm btn-success">Add Blog</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td class="text-end">{{ $blog->updated_at->diffForhumans() }}</td>
                                    <td class="d-flex justify-content-end gap-1">
                                        <a href="/blogs/{{ $blog->id }}/edit" class="btn btn-sm btn-warning">Update</a>
                                        <form action="/blogs/{{ $blog->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Delete {{ $blog->title }}')" type="submit"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
