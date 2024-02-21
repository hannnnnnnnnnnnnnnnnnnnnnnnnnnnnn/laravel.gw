<!-- resources/views/includes/_navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gacor kang</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jurusan.index') }}">Tabel Jurusan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('siswa.index') }}">Tabel Siswa</a>
                </li>
                <li class="nav-item dropdown ms-auto"> <!-- Tambahkan ms-auto di sini untuk menempatkan di sebelah kanan -->
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('jurusan.create') }}">Tambah Jurusan</a></li>
                        <li><a class="dropdown-item" href="{{ route('siswa.create') }}">Tambah Siswa</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form onsubmit="return confirm('Yakin ingin keluar dari akun anda?')" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

