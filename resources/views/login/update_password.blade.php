<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<body>
    <section class="vh-100">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-6">
                    <div class="card">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <form action="/create" method="post">
                                @method('patch')
                                @csrf
                                <h1 class="text-dark text-center">Password</h1>
                                <div class="form-group">
                                    <label for="password" class="text-dark">Password :</label>
                                    <input type="password" placeholder="Password" id="password" name="password" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="password" class="text-dark">New Password :</label>
                                    <input type="password" placeholder="New Password" id="password" name="New_password" class="form-control" />
                                </div>
                                
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-block bn31"><span class="bn31span">Daftar</span></button>
                                </div>
                                
                                <a href="/login" class="btn btn-secondary"\>Untuk kembali ke login</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
