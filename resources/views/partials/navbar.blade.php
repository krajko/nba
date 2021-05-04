<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 text-danger"> <strong>NBA</strong> </span>

        <div class="collapse navbar-collapse">

            @auth
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/">Teams</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/players">Players</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/news">News</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/news/create">Publish article</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="navbar-text mb-0 mx-4">Currently logged in as: <strong class="text-danger mx-1">{{ auth()->user()->name }}</strong></p>
                </li>

                <li class="nav-item">
                    <form class="" action="/logout" method="post">
                        @csrf
                        <button class="btn btn-sm mt-1 btn-outline-danger" type="submit" href="/logout">Logout</a>
                    </form>
                </li>
            </ul>

            @else

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/news">News</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            </ul>

            @endauth
        </div>
    </div>
</nav>

<style>
    .ml-auto {
        margin-left: auto;
    }
</style>