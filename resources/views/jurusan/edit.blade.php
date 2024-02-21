<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Pengaturan karakter set dan viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Judul halaman -->
    <title>Edit Jurusan</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Styling khusus untuk latar belakang body -->
    <style>
        body {
            background-image: linear-gradient( 109.6deg,  rgba(15,2,2,1) 11.2%, rgb(9, 93, 112) 91.1% );
            margin: 0;
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
        }
    </style>
</head>

<body>
    <!-- Container Bootstrap dengan margin top 5 -->
    <div class="container mt-5">
        <!-- Baris (row) dengan konten yang berpusat -->
        <div class="row justify-content-center">
            <!-- Kolom dengan padding 5, border yang dibulatkan, dan latar belakang yang berbeda -->
            <div class="my-1 p-5 rounded shadow-sm text-light col-md-6" style="background-image: linear-gradient( 109.6deg,  rgba(15,2,2,1) 11.2%, rgb(2, 91, 110) 91.1% ) ; ">
                <!-- Judul halaman edit jurusan -->
                <h1 class="text-center">Edit Jurusan</h1>
                <!-- Tombol untuk kembali ke indeks jurusan -->
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary mb-2">Kembali</a>

                <!-- Cek apakah ada data jurusan -->
                @if ($jurusan)
                    <!-- Form untuk melakukan update data jurusan -->
                    <form action="{{ route('jurusan.update', ['jurusan' => $jurusan->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Input untuk mengisi nama jurusan -->
                        <div class="form-group">
                            <label for="nama_jurusan">Nama Jurusan:</label>
                            <input type="text" class="form-control" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}">
                        </div>

                        <!-- Input untuk mengisi singkatan jurusan -->
                        <div class="form-group">
                            <label for="singkatan">Singkatan:</label>
                            <input type="text" class="form-control" name="singkatan" placeholder="Singkatan" value="{{ $jurusan->singkatan }}">
                        </div>

                        <!-- Tombol untuk menyimpan perubahan -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                @else
                    <!-- Pesan jika jurusan tidak ditemukan -->
                    <p>Jurusan not found.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan script lainnya -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
