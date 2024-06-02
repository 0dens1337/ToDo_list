<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">To-Do</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="/register">Sign upㅤ</a>
            <a class="nav-link fw-bold py-1 px-0" href="/login">Log inㅤ</a>
            <a class="nav-link fw-bold py-1 px-0" href="/">Homeㅤ</a>
            <a class="nav-link fw-bold py-1 px-0" href="/about">Aboutㅤ</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-danger">Logout</button>
            </form>
        </nav>
    </div>
</header>
