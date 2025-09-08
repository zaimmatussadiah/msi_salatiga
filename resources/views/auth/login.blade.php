<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Mentari Sehat Indonesia Kota Salatiga</title>
    <link href="/assets/img/logo-msi.jpg" rel="icon">
    <link href="/assets/img/logo-msi.jpg" rel="apple-touch-icon">
    <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
    body {
        margin: 0
    }
</style>

<body>
    <section>
        <div class="vh-100">
            <div class="d-flex flex-lg-row flex-column h-100">
                <div class="d-flex flex-column">
                    <img src="/assets/img/carousel/validasidata.jpg" class="h-100"
                        alt="Sample image">
                    <a href="{{route('home')}}" class="mb-2 fs-6">
                        <button class="btn btn-primary position-absolute top-0 m-2">
                            <i class="bi bi-arrow-left"></i>
                            Kembali ke Website
                        </button>
                    </a>
                </div>
                <div class="d-flex mt-5 align-items-center justify-content-center w-100">

                    @error('loginError')
                        <small style="color:red">{{ $message }}</small>
                    @enderror

                    <form method="post">
                        <p class="fs-3 fw-semibold">Masuk</p>
                        @csrf
                        <div class="input-group mb-3 d-flex">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text h-100">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        @error('email')
                            <small style="color:red">{{ $message }}</small>
                        @enderror

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="password">
                            <button class="btn p-0" type="button" id="togglePassword">
                                <div class="input-group-text h-100">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </button>
                        </div>

                        @error('password')
                            <small style="color:red">{{ $message }}</small>
                        @enderror

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12 justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary btn-block w-100">Login</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('togglePassword').addEventListener('click', function() {
                var passwordField = document.getElementById('password');
                var passwordFieldType = passwordField.getAttribute('type');
                passwordField.setAttribute('type', passwordFieldType === 'password' ? 'text' : 'password');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>

</html>
