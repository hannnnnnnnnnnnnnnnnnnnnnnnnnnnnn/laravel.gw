<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(108.8deg, rgba(1,22,56,1) 21.9%, rgba(52,33,158,1) 92.2%);
            margin: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background-image: linear-gradient(108.8deg, rgba(1,22,56,1) 21.9%, rgba(52,33,158,1) 92.2%);
            border-radius: 50px;
            padding: 50px;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Menampilkan pesan error jika validasi form gagal -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <!-- Mulai container untuk form edit -->
    <div class="container">
        <!-- Form edit data siswa dengan metode POST -->
        <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
            <!-- Menambahkan metode PUT untuk simulasi PUT request -->
            @method('PUT')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <!-- Container untuk form dengan gaya yang disesuaikan -->
                    <div class="form-container">
                        <h1 class="text-center">Edit Data Siswa</h1>
                        <!-- Input form untuk nama -->
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
                        </div>
                        <!-- Input form untuk NIS -->
                        <div class="form-group">
                            <label for="nis">NIS:</label>
                            <input type="number" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}">
                        </div>
                        <!-- Input form untuk jenis kelamin -->
                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <!-- Pilihan jenis kelamin menggunakan radio button -->
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-Laki"
                                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenisLaki">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan"{{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenisPerempuan">Perempuan</label>
                            </div>
                        </div>
                        <!-- Dropdown menu untuk memilih jurusan -->
                        <div class="form-group">
                            <label for="jurusan_id">Jurusan:</label>
                            <select class="form-control" id="jurusan_id" name="jurusan_id">
                                <option value="">-- PILIH --</option>
                                <!-- Menampilkan opsi dari data jurusan -->
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}" {{ old('jurusan_id', $siswa->jurusan_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Tombol untuk kembali ke halaman index dan menyimpan perubahan -->
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS dan script lainnya -->
    <script src="https://code.jquery.com/jquery-
