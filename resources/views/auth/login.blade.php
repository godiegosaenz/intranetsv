<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Intranet</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- jQuery -->
   <script src="{{asset('js/app.js')}}"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Intranet </b>GADMSV</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresa tus credenciales para iniciar sesión</p>
      <form action="/login" method="post">
        @csrf

        <div class="form-group">
          <label for="txtEmail">Correo :</label>
          <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="txtEmail" value="{{ old('email') }}" placeholder="Correo" aria-describedby="txtEmail-error" aria-invalid="true" required autofocus>
          @error('email')
          <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="txtpassword">Contraseña :</label>
          <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="txtpassword" placeholder="Clave">
          @error('password')
          <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
                <label for="remember">
              <input name="remember" type="checkbox" id="remember">

                Recordarme
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="btnLogin" type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Olvidé mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Solicitar usuario</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</body>
</html>
