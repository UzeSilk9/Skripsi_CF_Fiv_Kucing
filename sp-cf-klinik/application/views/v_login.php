<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Klinik drh.Riri</title>
  <link rel="icon" href="<?php echo base_url('aset'); ?>/logo.png" type="image/x-icon" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <style type="text/css">
    .ui-front {
      z-index: 1100;
    }
  </style>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    * {
      overflow: hidden
    }

    canvas {
      position: absolute
    }
  </style>
</head>

<body class="hold-transition login-page" class="particles-js-canvas-el" id="particles-js" style="background-color: #212529">


  <div class="login-box">
    <div class="login-logo">
      <table width="100%">
        <tr>
          <td>
            <h1 style="color: white">SP-CF-KLINIK</h1>
            <h1 style="color: white">Klinik drh.Riri</h1>
          </td>
        </tr>
      </table>
    </div>
    <!-- /.login-logo -->
    <div class="card ui-front">
      <div class="login-logo">
        <img style="width: 120px; margin-top: 5px;" class="login-logo" src="<?php echo base_url('aset/') ?>logo.png">
      </div>
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url('login/cekuser') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="user" id="user">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="pass" id="pass">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="col-8">
              <button type="submit" class="btn btn-flat btn-primary btn-block">Sign In</button>
            </div>
        </form>
        <div class="col-4">
          <a class="btn btn-flat btn-warning btn-block" href="<?php echo base_url('registrasi'); ?>">Register</a>
        </div>
      </div>

    </div>
  </div>

  </div>






  <script src="<?php echo base_url('aset/') ?>plugins/jquery/jquery.min.js"></script>

  <script src="<?php echo base_url('aset/') ?>plugins/jquery/particles.min.js"></script>
  <script src="<?php echo base_url('aset/') ?>plugins/jquery/cover.min.js"></script>




  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('aset/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('aset/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>