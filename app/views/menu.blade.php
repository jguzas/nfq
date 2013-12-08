<nav class="navbar navbar-inverse" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a href="/" class="navbar-brand">Pagrindinis</a>

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        @if (Auth::check())
        <ul class="nav navbar-nav">
            @if (Auth::user()->role == 'admin')
            <li><a href="/albums/create">Sukurti albumą</a></li>
            @endif
            <li><a href="/albums">Albumų sąrašas</a></li>

        </ul>
        @endif

        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check() )
            <li><p class="navbar-text">{{ Auth::user()->username }}</p></li>
            <li><a href="{{ URL::route("users/logout") }}">Atsijungti</a></li>
            @else
            <li><a href="{{ URL::route("users/login") }}">Prisijungti</a></li>
            @endif
        </ul>

    </div>

</nav>

