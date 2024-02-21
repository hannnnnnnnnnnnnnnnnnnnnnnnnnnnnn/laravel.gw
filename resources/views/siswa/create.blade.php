<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Styling untuk latar belakang body */
        body {
            background: linear-gradient(111.4deg, rgba(7,7,9,1) 6.5%, rgba(27,24,113,1) 93.2%);
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
        }
        /* Styling untuk judul h1 */
        h1 {
            font-size: 35px;
        }
        /* Styling untuk container form */
        .form-container {
            background-image: linear-gradient(108.8deg, rgba(1,22,56,1) 21.9%, rgba(52,33,158,1) 92.2%);
            border-radius: 70px;
            padding: 20px;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Menampilkan pesan error jika validasi form gagal -->
    @if ($errors->any())
    <div style="background-color: yellow">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- Mulai container untuk form tambah data siswa -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- Container untuk form dengan gaya yang disesuaikan -->
                <div class="form-container p-4 rounded shadow-sm text-light">
                    <!-- Judul form tambah data siswa -->
                    <h1 class="text-center">Tambah Data Siswa</h1>
                    <!-- Form dengan metode POST yang menuju route 'siswa.store' -->
                    <form action="{{ route('siswa.store') }}"  method="POST">
                        <!-- Token CSRF untuk keamanan form -->
                        {{ csrf_field() }}
                        <!-- Tombol untuk kembali ke halaman index -->
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-2 btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <!-- Input form untuk nama -->
                        <div class="form-group">
                            <label for="nama"><i class="fas fa-user"></i> Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="{{ old('nama') }}">
                        </div>
                        <!-- Input form untuk NIS -->
                        <div class="form-group">
                            <label for="nis"><i class="fas fa-id-card"></i> NIS:</label>
                            <input type="number" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="{{ old('nis') }}">
                        </div>
                        <!-- Input form untuk jenis kelamin -->
                        <div class="form-group">
                            <label><i class="fas fa-venus-mars"></i> Jenis Kelamin:</label>
                            <!-- Pilihan jenis kelamin menggunakan radio button -->
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-Laki" id="laki-laki">
                                <label class="form-check-label" for="laki-laki"><i class="fas fa-mars"></i> Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" id="perempuan">
                                <label class="form-check-label" for="perempuan"><i class="fas fa-venus"></i> Perempuan</label>
                            </div>
                        </div>
                        <!-- Dropdown menu untuk memilih jurusan -->
                        <div class="form-group">
                            <label for="jurusan_id"><i class="fas fa-university"></i> Jurusan ID:</label>
                            <select class="form-control" id="jurusan_id" name="jurusan_id">
                                <option value="" class="text-center">-- PILIH --</option>
                                <!-- Menampilkan opsi dari data jurusan -->
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Tombol untuk menyimpan data siswa dan link tambah data jurusan -->
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('jurusan.create') }}" class="btn btn-dark mb-2 float-right mr-2 btn-sm">
                            <i class="fas fa-university"></i> Tambah Data Jurusan
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan script lainnya -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
