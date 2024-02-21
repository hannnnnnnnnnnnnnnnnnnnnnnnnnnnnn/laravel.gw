<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            height: 200vh;
            overflow: hidden;
        }
        .card {
            border: none;
            border-radius: 35px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
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
    @if ($errors->any())
    <div class="alert alert-warning">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <section class="vh-100">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-body p-4 p-lg-5">
                            <form action="/create" method="post">
                                @csrf
                                <h1 class="text-center mb-4">Register</h1>
    
                                <div class="form-group mb-3">
                                    <label for="name" class="text-dark">Nama:</label>
                                    <input type="text" placeholder="Masukkan Nama" value="{{ Session::get('name') }}" name='name' class="form-control" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="text-dark">Username:</label>
                                    <input type="text" placeholder="Masukkan Username" value="{{ Session::get('username') }}" name='username' class="form-control" />
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email" class="text-dark">Email:</label>
                                    <input type="text" placeholder="Masukkan Email" value="{{ Session::get('email') }}" name='email' class="form-control" />
                                </div>
    
                                <div class="form-group mb-3">
                                    <label for="password" class="text-dark">Password:</label>
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control" />
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
</body>
</html>
