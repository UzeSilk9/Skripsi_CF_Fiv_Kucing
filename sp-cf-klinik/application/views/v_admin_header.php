<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Klinik drh.Riri</title>
  <link rel="icon" href="<?php echo base_url('aset'); ?>/logo.png" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- alert -->
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/toastr/toastr.min.css">

  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/jquery-ui/jquery-ui.structure.css">
  <link rel="stylesheet" href="<?php echo base_url('aset/') ?>plugins/jquery-ui/jquery-ui.theme.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>



      <!-- Right navbar links -->
      <!-- <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul> -->
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url() ?>" class="brand-link">
        <img src="<?php echo base_url('aset/') ?>logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Klinik drh.Riri</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <?php if ($this->session->userdata('user')) { ?>
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?php echo base_url('aset/'); ?>dist/img/<?php echo $this->session->userdata('user'); ?>.jpg" onError="this.onerror=null;this.src='<?= base_url('aset/') ?>default.png';" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="<?php echo base_url('admin_gantifoto/foto//?#') ?>" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
            </div>
          </div>
        <?php  } ?>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url() ?>admin_beranda" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('admin_about') ?>" class="nav-link">
                <i class="fas fa-info nav-icon"></i>
                <p> About</p>
              </a>
            </li>

            <?php echo $this->session->userdata('list_menukiri'); ?>


            <?php
            if ($this->session->userdata('groupnama') == 'Admin') { ?>
              <li class="nav-item">
                <a href="#" onclick="laporan()" class="nav-link">
                  <i class="fas fa-print nav-icon"></i>
                  <p> Laporan</p>
                </a>
              </li>
            <?php }
            ?>


            <?php if ($this->session->userdata('user')) { ?>
              <li class="nav-item">
                <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p> Log Out</p>
                </a>
              </li>
              <?php  } else {

              if ($this->uri->segment(1) != 'registrasi') { ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('registrasi') ?>" class="nav-link">
                    <i class="fas fa-user-plus nav-icon"></i>
                    <p> Registrasi</p>
                  </a>
                </li>
              <?php } ?>




              <li class="nav-item">
                <a href="<?php echo base_url('login') ?>" class="nav-link">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p> Login</p>
                </a>
              </li>

            <?php  } ?>











          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>









    <script>
      function laporan() {
        $('#modal_laporan').modal('show');
      }


      function get_laporan() {
        var bulan = $('#rekap_bulan').val();
        var jabatan = $('#laporan_data_jabatan').val();
        var nama = $('#laporan_data_penanggung_jawab').val();
        window.open('<?php echo base_url() ?>Admin_beranda/laporan/' + bulan + '?jabatan=' + jabatan + '&nama=' + nama, '_blank');
      }
    </script>





    <div class="modal fade" id="modal_laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal_title" id="exampleModalLabel">Pilih Periode</h5>
          </div>
          <div class="modal-body">
            <form id="id_form_rekap_registrasi">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Bulan :</label>
                <input type="month" id="rekap_bulan" name="rekap_bulan" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Jabatan Penanggung Jawab :</label>
                <input type="text" class="form-control" id="laporan_data_jabatan" name="laporan_data_jabatan">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Nama Penanggung Jawab :</label>
                <input type="text" class="form-control" id="laporan_data_penanggung_jawab" name="laporan_data_penanggung_jawab">
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
            <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" onclick="get_laporan()"> Cetak</button>
          </div>
        </div>
      </div>
    </div>