<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Judul Halaman Anda</title>
    <!-- Konten tambahan di dalam head -->
    <style>
        body {
            background: linear-gradient(89.7deg, rgba(0, 0, 0, 1) -10.7%, rgb(23, 0, 77) 40%, rgb(0, 20, 110) 88.8%);
            color: white;
        }

        .container {
            max-width: 800px;
        }

        .table {
            font-size: 14px;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
        }

        h1 {
            font-size: 40px;
        }

        .btn {
            font-size: 14px;
        }

        .j {
            color: rgb(155, 158, 161);
        }
    </style>
</head>

<body>


    @include('include\includes')

    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
        @endif

        <h1 class="text-center text-white"><i class="fa fa-table"></i> Tabel Siswa</h1>
        </a>

        {{-- untuk menampilkan user yang sudah login atau sudah terauthenticate  --}}
        @if (Auth::check())
        <p>Selamat Datang : {{ $user->name }}</p>
        @endif

        <table class="table table-bordered table-sm" style="background-image: linear-gradient( 89.7deg, rgba(0,0,0,1) -10.7%, rgb(0, 25, 46) 88.8% );">
            <thead>
                <tr>
                    <th class="text-center text-white">Nama</th>
                    <th class="text-center text-white">NIS</th>
                    <th class="text-center text-white">Jenis Kelamin</th>
                    <th class="text-center text-white">Jurusan</th>
                    <th class="text-center text-white">Aksi</th>
                </tr>
            </thead>
            <!-- ... (kode HTML lainnya) ... -->

            <tbody>
                @foreach ($siswa as $item)
                <tr>
                    <td class="text-white">{{ $item->nama }}</td>
                    <td class="text-white">{{ $item->nis }}</td>
                    <td class="text-white">{{ $item->jenis_kelamin }}</td>
                    <td class="text-white">
                        @if ($item->jurusan)
                        {{ $item->jurusan->nama_jurusan }}
                        @else
                        <i class="j">(Jurusan sudah dihapus!!!)</i>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')"
                                action="{{ route('siswa.destroy', $item->id) }}" method="POST">
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

    <!-- Bootstrap JS dan skrip lainnya -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
