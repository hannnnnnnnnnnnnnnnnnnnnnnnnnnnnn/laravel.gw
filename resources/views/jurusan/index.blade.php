<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        /* Styling untuk latar belakang body */
        body {
            background-image: radial-gradient( circle 976px at 51.2% 51%, rgba(11,27,103,1) 0%, rgba(16,66,157,1) 0%, rgba(11,27,103,1) 17.3%, rgba(11,27,103,1) 58.8%, rgba(11,27,103,1) 71.4%, rgba(16,66,157,1) 100.2%, rgba(187,187,187,1) 100.2% );
        }

        /* Menetapkan lebar maksimum untuk container */
        .container {
            max-width: 950px;
        }

        /* Styling untuk sel header dan data pada tabel */
        th,
        td {
            padding: 12px; 
            text-align: center;
        }
    </style>
</head>
<body>

    @include('include\includes')

    <div class="container mt-4">
        <!-- Menampilkan pesan success jika ada -->
        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

        <!-- Judul Tabel Jurusan -->
        <h1 class="text-center text-white"><i class="fa fa-table"></i> Tabel Jurusan</h1>
        
        <!-- Tombol untuk tambah data jurusan -->
        <a href="{{ route('jurusan.create') }}" class="btn btn-primary mb-2 btn-sm">
            <i class="fas fa-plus"></i> Tambah Data Jurusan
        </a>

        <!-- Tabel Jurusan dengan styling background -->
        <table class="table table-sm table-bordered " style="background-image: linear-gradient( 89.7deg,  rgba(0,0,0,1) -10.7%, rgb(20, 18, 46) 88.8% );">
            <thead>
                <!-- Header Kolom Tabel -->
                <tr>
                    <th class="text-center text-white">Nama Jurusan</th>
                    <th class="text-center text-white">Singkatan</th>
                    <th class="text-center text-white">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data jurusan -->
                @foreach ($jurusan as $item)
                    <tr>
                        <td class="text-white">{{ $item->nama_jurusan }}</td>
                        <td class="text-white">{{ $item->singkatan }}</td>
                        <td class="text-center">
                            <!-- Tombol edit dan form hapus data jurusan -->
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ route('jurusan.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS dan script lainnya -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
