<div class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Welcome {{auth()->user()->name??''}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href='#' class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </a>
                </form>
            </div>
        </li>
    </ul>
</div>