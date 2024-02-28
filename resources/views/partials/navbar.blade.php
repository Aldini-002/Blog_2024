<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" data-bs-theme="dark">
    <div class="container">

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a class="navbar-brand col-lg-3 me-0 fw-bold" href="/"><span
                    class="fw-normal text-danger">My</span>BLOG</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false">Blogs</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="/myblogs">
                                {{ Auth::user()->is_admin ? 'Setting Blogs' : 'My Blogs' }}
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="/blogs">All Blogs</a></li>
                    </ul>
                </li>
                @if (Auth::user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/users">Users</a>
                    </li>
                @endif
            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item dropdown">
                        <a class="btn btn-sm btn-outline-danger" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu text-center">
                            {{-- <li><a class="dropdown-item" href="/profile">Profile</a></li> --}}
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
