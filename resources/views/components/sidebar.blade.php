<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">SIPSAR</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">SIP</a>
        </div>
        <ul class="sidebar-menu">
            <div class="dropdown-divider"></div>
            <li class="menu-header">Dashboard</li>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                    <i class="fas fa-fire"></i><span>Profil Sekolah</span></a>
            </li>

            <li class="nav-item">
                <a href="{{route('guru.index')}}" class="">
                    <i class="fas fa-user"></i> <span>Tenaga Pengajar</span></a>
            </li>

            <li class="nav-item">
                <a href="{{route('pengumuman.index')}}" class="">
                    <i class="fas fa-file-alt"></i> <span>Pengumuman</span></a>
            </li>

            <li class="nav-item">
                <a href="{{route('event.index')}}" class="">
                    <i class="fas fa-pencil-ruler"></i> <span>Event</span></a>
            </li>

            {{-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ route('user.index') }}">All Users</a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fab fa-uncharted"></i>
                    <span>Products</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('product.index') }}">All Products</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fab fa-opencart"></i>
                    <span>Penjualan</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('order.index')}}">Data Transaksi</a>
                    </li>
                </ul>
            </li> --}}

            <div class="dropdown-divider"></div>
            <li class="menu-header">Action</li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link text-danger" onclick="event.preventDefault();
                document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                        @csrf
                        </form>
            </li>
        </ul>
    </aside>
</div>
