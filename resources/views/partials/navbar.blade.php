
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="https://keukenfabrikant.nl/wp-content/uploads/2018/05/keukenfabrikant-1200280-300x70.png"
        alt="logo" height="60px" alt="LogoInfocus">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                &nbsp; 
                <li class="nav-item">
                <a href="/contact" class="nav-link">contact</a>
                </li>
            @else
            @if(Auth::user()->blocked == '1')
                <style>
                    .dropdown {
                        right: 0;
                        left: auto;
                    }
                </style>
                <div class="user-profile">
                    <div class="dropdown">      
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="/storage/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:1px; left:10px; border-radius:50%;">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">  
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    <button class="dropdown-item" href="{{ route('logout') }}">Logout</button>
                                    @csrf
                                </form>
                        </div>
                    </div>
                </div>
            @elseif (Auth::user()->blocked == '0')
                <style>
                    .dropdown {
                        right: 0;
                        left: auto;
                    }
                </style>
                <li class="nav-item">
                    <a href="/faq" class="nav-link">Veelgestelde vragen</a>
                </li>
                <li class="nav-item">
                    <a href="/contact" class="nav-link">contact</a>
                </li>
                <div class="user-profile">
                    <div class="dropdown">      
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="/storage/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:1px; left:10px; border-radius:50%;">
                            {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">  
                            <a class="dropdown-item" type="button" href="/profile/{{Auth::user()->id}}"><i class="fas fa-address-card"></i>Profielpagina</a>                  
                            <a class="dropdown-item" type="button" href="/posts/create"><i class="fas fa-pencil-alt"></i>Maak Post</a>
                            <a class="dropdown-item" type="button" href="/overzicht"><i class="fas fa-pencil-alt"></i>post overzicht</a>
                            @if(Auth::user()->role == 'admin')
                                <a class="dropdown-item" type="button" href="/admin/users"><i class="fas fa-user-shield"></i>Admin paneel</a>
                            @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    <button class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</button>
                                    @csrf
                                </form>
                        </div>
                        &nbsp; 
                    </div>
                </div>
                
            @endif
        @endguest  
    </ul>
</div>
</div>
</nav>
