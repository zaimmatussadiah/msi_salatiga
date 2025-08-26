        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Login</title>
          
            <link href="/assets/img/logo-msi.jpg" rel="icon">
            <link href="/assets/img/logo-msi.jpg" rel="apple-touch-icon">

          <!-- Google Font: Source Sans Pro -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
          <!-- Font Awesome -->
          <link rel="stylesheet" href="/lte/plugins/fontawesome-free/css/all.min.css">
          <!-- icheck bootstrap -->
          <link rel="stylesheet" href="/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
          

          
          <style>
            body {
                    background-image: url('/assets/img/carousel/idulfitri-pengurus.jpg'); /* Ganti 'path_to_your_image.jpg' dengan path gambar Anda */
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                  }
            </style>


        </head>
        <body class="hold-transition login-page">
          <a href="/" class="btn btn-primary mb-3 position-absolute" style="top: 5%; left: 10%; margin-right: 10%;">Kembali</a>
        <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="/" class="h1"><b>MSI KAB.DEMAK</a>
            </div>
            <div class="card-body">
              <p class="login-box-msg">Silahkan masukan email dan password</p>

                @error('loginError')
                <small style="color:red">{{ $message }}</small>
                @enderror

              <form method="post">
                @csrf
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Email" name="email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>

                @error('email')
                <small style="color:red">{{ $message }}</small>
                @enderror

                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                @error('password')
                  <small style="color:red">{{ $message }}</small>
                @enderror

                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.login-box -->
        
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

        <!-- jQuery -->
        <script src="/lte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/lte/dist/js/adminlte.min.js"></script>
        </body>
        </html>
