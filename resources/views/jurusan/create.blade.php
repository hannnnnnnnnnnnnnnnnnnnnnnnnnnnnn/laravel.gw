<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Pengaturan karakter set dan viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Judul halaman -->
    <title>Tambah Data Jurusan</title>
    <!-- Link ke Bootstrap CSS dan Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Styling khusus untuk latar belakang body -->
    <style>
        body {
            background: linear-gradient(89.7deg, rgba(0, 0, 0, 1) -10.7%, rgb(3, 35, 63) 40%, rgb(0, 2, 129) 88.8%);
            color: white;
        }
        /* Styling untuk container form */
        .form-container {
            background-image: linear-gradient(108.8deg, rgba(1,22,56,1) 21.9%, rgba(52,33,158,1) 92.2%);
            border-radius: 50px;
            padding: 25px;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Container Bootstrap dengan margin top 5 -->
    <div class="container mt-5">
        <!-- Baris (row) dengan konten yang berpusat -->
        <div class="row justify-content-center">
            <!-- Kolom Bootstrap dengan lebar medium 6 -->
            <div class="col-md-6">
                <!-- Container untuk form dengan border yang dibulatkan dan bayangan -->
                <div class="form-container">
                    <!-- Form untuk menambah data jurusan -->
                    <div class="rounded shadow-sm text-light">
                        <!-- Judul form -->
                        <h1 class="mb-3 text-center"><i class="fas fa-university"></i> Tambah Data Jurusan</h1>
                        <!-- Tombol kembali ke indeks siswa -->
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary mb-3 btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <!-- Form untuk input data jurusan -->
                        <form action="{{ route('jurusan.store') }}" method="POST">
                            @csrf
                            <!-- Input untuk nama jurusan -->
                            <div class="form-group">
                                <label for="nama_jurusan"><i class="fas fa-book"></i> Nama Jurusan :</label>
                                <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan jurusan">
                            </div>
                            <!-- Input untuk singkatan jurusan -->
                            <div class="form-group">
                                <label for="singkatan"><i class="fas fa-font"></i> Singkatan :</label>
                                <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="Singkatan">
                            </div>
                            <!-- Tombol untuk menyimpan data -->
                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
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
