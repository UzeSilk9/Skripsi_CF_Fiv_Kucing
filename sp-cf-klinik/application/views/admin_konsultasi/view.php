<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Halaman Diagnosa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Halaman Diagnosa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <form id="id_form" action="<?php echo base_url('admin_konsultasi/proses'); ?>" method="POST">
            <table>
              <tr>
                <td>Nama</td>
                <td> : <?= $pemelihara->nama; ?></td>
              </tr>
              <tr>
                <td>Umur</td>
                <td> : <?= $pemelihara->umur; ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td> : <?= $pemelihara->jk; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td> : <?= $pemelihara->email; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td> : <?= $pemelihara->alamat; ?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td> : <?= date('d F Y'); ?></td>
              </tr>
            </table>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pilih Gejala</h3>
              </div>

              <div class="card-body">
                <!-- Minimal style -->

                <table>
                  <?php foreach ($daftar as $user) { ?>

                    <tr>
                      <td>
                        <label for="<?php echo $user->id_gejala; ?>" class="col-form-label" style="padding-top: calc(0rem + 1px)"><?php echo $user->id_gejala . ' - ' . $user->nama_gejala; ?></label>
                      </td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <select class="form-control" name="<?php echo $user->id_gejala; ?>" id="<?php echo $user->id_gejala; ?>">
                          <option value="">Pilih</option>
                          <option value='-1.0'>Pasti Tidak</option>
                          <option value='-0.8'>Hampir Pasti Tidak</option>
                          <option value='-0.6'>Kemungkinan Besar Tidak</option>
                          <option value='-0.4'>Mungkin Tidak</option>
                          <option value='-0.2'>Tidak Tau / Tidak Yakin (-0.2)</option>
                          <option value='0'>Tidak Tau / Tidak Yakin (0.0)</option>
                          <option value='0.2'>Tidak Tau / Tidak Yakin (0.2)</option>
                          <option value='0.4'>Mungkin Iya</option>
                          <option value='0.6'>Kemungkinan Besar</option>
                          <option value='0.8'>Hampir Pasti</option>
                          <option value='1.0'>Pasti Iya</option>
                        </select>
                      </td>
                    </tr>
                  <?php } ?>
                </table>



                <button type="submit" class="btn btn-primary btn-flat" onclick="proses()"> Proses</button>


              </div>

            </div>
            <!-- /.card -->



          </form>



        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>