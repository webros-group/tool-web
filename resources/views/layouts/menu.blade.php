<nav class="navbar navbar-expand-md navbar-light navbar-laravel menu-header nav-menu-header pt-0 pb-0">
    <div class="row menu-row">
        <div class="col-md-7 logo-block">
        </div>

        <div class="col-md-5" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- <ul class="navbar-nav mr-auto">

            </ul> -->

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav float-right menu-right-header flex-nowrap flex-row">
                <!-- Authentication Links -->
                <div class="menu-right-home">
                    <div class="block-sign-in float-right menu-right-login">
                        @guest
                        @else

                            <a class="link-header-menu {{ Request::route()->getName() == 'includeCard' ? 'active' : '' }}" href="{{ route('includeCard') }}">Nhập </a>
                        @endguest
                        <a class="link-header-menu {{ Request::route()->getName() == 'xeVao' ? 'active' : '' }}" href="{{ route('xeVao') }}">Xe Vào</a>
                        <a class="link-header-menu {{ Request::route()->getName() == 'xeRa' ? 'active' : '' }}" href="{{ route('xeRa') }}">Xe Ra</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>