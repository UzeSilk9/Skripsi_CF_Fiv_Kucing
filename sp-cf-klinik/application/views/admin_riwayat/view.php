<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Riwayat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Data Riwayat</li>
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
          <div class="card">
            <div class="card-header">
              <div style="text-align: right;">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Konsul ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Diagnosa</th>
                    <th>Similarity</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($daftar as $user) {
                    $no++; ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $user->id_konsultasi; ?></td>
                      <td><?php echo $user->nama; ?></td>
                      <td><?php echo $user->tgl; ?></td>
                      <td><?php echo $user->nm_penyakit; ?></td>
                      <td><?php echo $user->hasil_max; ?></td>
                      <td>
                        <?php $id = $user->id_konsultasi; ?>
                        <button class="btn btn-warning btn-flat" onclick="cetak('<?php echo $id ?>')"><i class="fa fa-print"></i></button>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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
  var riwayat_id = '';

  function cetak(id) {
    riwayat_id = id;
    $('#modal_form_cetak').modal('show');
  }

  function cetak_print() {
    var jabatan = $('#data_jabatan').val();
    var nama = $('#data_penanggung_jawab').val();
    window.open('<?php echo base_url() ?>admin_riwayat/cetak/' + riwayat_id + '?jabatan=' + jabatan + '&nama=' + nama, '_blank');
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