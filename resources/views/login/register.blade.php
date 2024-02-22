<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <!-- Mengganti versi Bootstrap ke yang terbaru (Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <style>
        body {
            background-image: linear-gradient( 179deg,  rgba(0,0,0,1) 9.2%, rgba(127,16,16,1) 103.9% );
            height: 100vh;
            overflow: hidden;
        }
        .card {
            border: none;
            border-radius: 45px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 1.5rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-primary:hover, .btn-secondary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .alert {
            border-radius: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    
    <section>
        <div class="container py-3 h-100">
            <div class="row  justify-content-center align-items-center h-100">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="/create" method="post">
                                @csrf
                                <h1 class="text-center mb-4">Register</h1>
    
                                <div class="mb-1">
                                    <label for="name" class="form-label text-dark">Nama:</label>
                                    <input type="text" placeholder="Masukkan Nama" value="{{ Session::get('name') }}" name='name' class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label for="username" class="form-label text-dark">Username:</label>
                                    <input type="text" placeholder="Masukkan Username" value="{{ Session::get('username') }}" name='username' class="form-control @error('username') is-invalid @enderror" />
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-1">
                                    <label for="email" class="form-label text-dark">Email:</label>
                                    <input type="text" placeholder="Masukkan Email" value="{{ Session::get('email') }}" name='email' class="form-control @error('email') is-invalid @enderror" />
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="mb-1">
                                    <label for="password" class="form-label text-dark">Password:</label>
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                                </div>
                                
                                <a href="/login" class="btn btn-secondary btn-block mt-3">Kembali ke login</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menambahkan script Bootstrap (JS) yang diperlukan -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/6p1eaRxPi1oWzsnUER7o+rdJdUR46A1GBs9Aq0Y0p4fKd5SiAaInh/bB9trA+BR" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8INl3p1w/KC0cQCPyy4J5q+XcN+eOEmn5gE+2qX6ZlfYWR6m7KDcIIaZM2ei" crossorigin="anonymous"></script>
</body>
</html>
