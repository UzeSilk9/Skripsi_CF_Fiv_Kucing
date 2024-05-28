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
              <h3 class="card-title">Hasil Diagnosa</h3>
            </div>

            <div class="card-body">



              <?php foreach ($penyakit as $key) { ?>
                <table>
                  <tr>
                    <td>penyakit</td>
                    <td> : <?php echo $key->nama_penyakit; ?></td>
                  </tr>
                  <tr>
                    <td>Similarity</td>
                    <td> : <?php echo $total; ?> %</td>
                  </tr>
                  <tr>
                    <td>Keterangan penyakit</td>
                    <td> : <?php echo $key->ket; ?></td>
                  </tr>
                  <tr>
                    <td>Penanbanan penyakit</td>
                    <td> : <?php echo $key->solusi; ?></td>
                  </tr>
                </table>
              <?php  }    ?>

              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gejala yang Dialami</th>
                    <th>Nilai</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($gejala as $gej) {
                    $no++;
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $gej['nama_gejala']; ?></td>
                      <td><?php echo $gej['nilai']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>



              <br><br><br>
              <p>Hasil Diagnosa</p>
              <!-- Minimal style -->
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>penyakit</th>
                    <th>Kemungkinan %</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $keys = array_column($daftar, 'hasil');
                  array_multisort($keys, SORT_DESC, $daftar);
                  $no = 0;
                  foreach ($daftar as $user) {
                    $no++;
                    if ($user['hasil'] > 0) {
                  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $user['nama_penyakit']; ?></td>
                        <td><?php echo $user['hasil']; ?></td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
              <br>
              <div class="pull-right">
                <div style="text-align: right;">
                  <button type="button" class="btn btn-primary btn-flat" onclick="cetak()"> Cetak</button>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card -->






        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>











<script>
  function cetak() {
    $('#modal_form_cetak').modal('show');
  }

  function cetak_print() {
    var jabatan = $('#data_jabatan').val();
    var nama = $('#data_penanggung_jawab').val();
    window.open('<?php echo base_url() ?>admin_konsultasi/cetak/<?= $riwayat_id; ?>?jabatan=' + jabatan + '&nama=' + nama, '_blank');
  }
</script>









<div class="modal fade" id="modal_form_cetak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Parameter</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="message-text" class="col-form-label">Jabatan Penanggung Jawab :</label>
          <input type="text" class="form-control" id="data_jabatan" name="data_jabatan">
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">Nama Penanggung Jawab :</label>
          <input type="text" class="form-control" id="data_penanggung_jawab" name="data_penanggung_jawab">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary" onclick="cetak_print()"> Cetak</button>
      </div>
    </div>
  </div>
</div>