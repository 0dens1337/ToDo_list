<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">To-Do</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle ms-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="/register">Sign up</a></li>
                    <li><a class="dropdown-item" href="/login">Log in</a></li>
                    <li><a class="dropdown-item" href="/">Home</a></li>
                    <li><a class="dropdown-item" href="/about">About</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
