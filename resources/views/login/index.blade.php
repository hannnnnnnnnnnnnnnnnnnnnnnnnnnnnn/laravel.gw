<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body dark-container">
                        <h1 class="text-center">Login</h1>


                        <form action="{{ url('/login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email_or_username" class="form-label">Email/UserName:</label>
                                <input type="text" placeholder="Masukkan Email/Username" class="form-control  @error('email_or_username') is-invalid @enderror" name='email_or_username'  required autofocus  value="{{ old('email_or_username') }}">
                                    @error('email_or_username')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password"  required>
                            </div>
                            <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary btn-block bn5">Login</button>
                            </div>
                        </form>
                        <div class="card-footer">
                        <p class="text-center">Belum punya akun? <a href="/register">Daftar disini</a></p>
                    </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
