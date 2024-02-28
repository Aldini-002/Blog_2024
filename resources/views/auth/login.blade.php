@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="fw-bold"><span class="text-danger fw-normal">My</span>BLOG
                        </h1>
                    </div>
                    <div class="col-12 my-3">
                        <div class="text-success fs-3 fw-light">Login</div>
                    </div>
                </div>

                <div class="row">
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
                </div>

                <form action="/login" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Email</label>
                        </div>
                        <div class="col-12">
                            <input type="email" name="email" id="email" class="form-control" autocomplete="off"
                                required value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="">Password</label>
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off"
                                required>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info" style="width: 100%">Login</button>
                        </div>
                        <div class="col-12">
                            <div class="text-secondary">
                                Don't have account.
                                <a href="/register" class="fw-bold text-decoration-none">Register</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
