<header class="text-white p-3 d-flex justify-content-end" style="background-color: #07225E;">
    <div class="dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <!-- <li><hr class="dropdown-divider"></li> -->
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
    <nav class="text-white vh-100 p-3" style="width: 250px;background-color: #07225E;" >
       
        <ul class="nav flex-column nav-underline">
            <li class="nav-item">
                <a class="nav-link text-light  {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('beranda.form') }}">Master Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('kenapa') ? 'active' : '' }}" href="{{ route('kenapa.index') }}">Why Join HIPMI</a>
            </li>
     
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('berita') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('kategori-berita') ? 'active' : '' }}" href="{{ route('kategori-berita.index') }}">Kategori Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('kegiatan') ? 'active' : '' }}" href="{{ route('kegiatan.index') }}">Jadwal Event HIPMI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('kegiatan-selesai') ? 'active' : '' }}" href="{{ route('kegiatan-selesai.index') }}">Dokumentasi Event Selesai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('anggota') ? 'active' : '' }}" href="{{ route('anggota.index') }}">Logo Anggota HIPMI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('divisi') ? 'active' : '' }}" href="{{ route('divisi.index') }}">Keanggotaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light {{ Request::is('festad') ? 'active' : '' }}" href="{{ route('festad.index') }}">HIPMI Fest</a>
            </li>
        </ul>
    </nav>