
<nav class="menu" id="theMenu">
    <div class="menu-wrap">
        @guest
            <h1 class="logo"><a href="{{ route('login') }}" class="smoothscroll">Login</a></h1>
        @else
            <h1 class="logo"><a href="#home" class="smoothscroll">{{ Auth::user()->name }}</a></h1>
        @endguest
        <i class="fa fa-times menu-close"></i>
        <a href="/" >Home</a>
        <a href="/games" >Collection</a>
        @auth
            <a href="/home" >Dashboard</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-envelope"></i></a>
    </div>

    <!-- Menu button -->
    <div id="menuToggle"><i class="fa fa-bars"></i></div>
</nav>
