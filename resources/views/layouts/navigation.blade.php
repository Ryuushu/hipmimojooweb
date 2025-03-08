<header class="bg-dark text-white p-3 d-flex justify-content-end">
    <div class="dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Log Out</button>
                </form>
            </li>
        </ul>
    </div>
</header>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="bg-dark text-white vh-100 p-3" style="width: 250px;">
        <h4 class="text-center">Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('Master Beranda') ? 'active' : '' }}" href="{{ route('beranda.form') }}">Master Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('Why') ? 'active' : '' }}" href="{{ route('kenapa.index') }}">Why</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('Master Pengurus') ? 'active' : '' }}" href="{{ route('pengurus.index') }}">Master Pengurus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('Berita') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('Kategori Berita') ? 'active' : '' }}" href="{{ route('kategori-berita.index') }}">Kategori Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('kegiatan') ? 'active' : '' }}" href="{{ route('kegiatan.index') }}">Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('kegiatan-selesai') ? 'active' : '' }}" href="{{ route('kegiatan-selesai.index') }}">Kegiatan Selesai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ request()->routeIs('anggota') ? 'active' : '' }}" href="{{ route('anggota.index') }}">Anggota</a>
            </li>
        </ul>
    </nav>