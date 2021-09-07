<nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/"><img id="navbar-logo" src="img/logoAntriedark.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="{{ route('signup') }}">Sign Up</a>
                <a class="nav-link" href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>
</nav>
