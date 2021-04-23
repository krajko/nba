<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 text-danger"> <strong>NBA</strong> </span>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/">Teams</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/players">Players</a>
                </li>

                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-sm mt-1 btn-outline-danger" type="submit" href="/logout">Logout</a>
                    </form>
                </li>

                @else
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>