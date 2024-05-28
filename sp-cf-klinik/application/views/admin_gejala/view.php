<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Gejala</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Data Gejala</li>
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
                <button type="button" class="btn btn-primary btn-flat" onclick="tambah_data()"> Tambah Data</button>
                <button type="button" class="btn btn-primary btn-flat" onclick="download()"> Download</button>
                <button type="button" class="btn btn-primary btn-flat" onclick="cetak()"> Cetak</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gejala ID</th>
                    <th>Gejala</th>
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
                      <td><?php echo $user->id_gejala; ?></td>
                      <td><?php echo $user->nama_gejala; ?></td>
                      <td>
                        <?php $id = $user->id_gejala; ?>
                        <button class="btn btn-warning btn-flat" onclick="edit('<?php echo $id ?>')"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger btn-flat" onclick="hapus('<?php echo $id ?>')"><i class="fa fa-trash"></i></button>

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














<script type="text/javascript">
  var save_mothod;
  var table;

  function tambah_data() {
    save_mothod = 'add';
    $('#id_form')[0].reset();
    $('#modal_form').modal('show');

  }


  function save() {
    var nama_gejala = $('#nama_gejala').val();

    if (nama_gejala.trim() == '') {
      alert('Masukkan gejala.');
      $('#nama_gejala').focus();
      return false;
    } else {


      var url;
      if (save_mothod == 'add') {
        url = '<?php echo base_url('admin_gejala/simpan'); ?>';
      } else {
        url = '<?php echo base_url('admin_gejala/simpanedit'); ?>';
      }

      $.ajax({
        url: url,
        type: 'POST',
        data: $('#id_form').serialize(),
        dataType: "JSON",
        success: function(data) {
          $('#modal_form').modal('hide');
          location.reload();

        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error Simpan / Update data ...!')
        }
      })


    }
  }


  function hapus(id) {
    if (confirm('Apakah data ini ingin di hapus ?')) {
      $('#id_form_hapus')[0].reset();
      $('#modal_form_hapus').modal('show');

      $('[name="solusi_id"]').val(id);
    }
  }



  function simpan_hapus() {
    var password = $('#password').val();

    if (password.trim() == '') {
      alert('Masukan ulang password login anda..! ');
      $('#password').focus();
      return false;

    } else {
      var url = '<?php echo base_url('admin_gejala/hapus'); ?>';
      $.ajax({
        url: url,
        type: 'POST',
        data: $('#id_form_hapus').serialize(),
        dataType: "JSON",
        success: function(data) {

          $('#modal_form_hapus').modal('hide');
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error saat hapus data ...!')
        }
      })


    }
  }




  function edit(id) {
    save_mothod = 'edit';
    $('#id_form')[0].reset();
    $.ajax({
      url: "<?php echo base_url('admin_gejala/edit/'); ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="kode"]').val(data.id_gejala);
        $('[name="nama_gejala"]').val(data.nama_gejala);

        $('#modal_form').modal('show');
        $('.modal_title').text('Edit Solusi');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error GET data from Ajax ...!')
      }

    });
  }




  function download() {
    window.location.href = "<?php echo base_url('admin_gejala/download/') ?>";
  }


  function cetak() {
    $('#modal_form_cetak').modal('show');
  }

  function cetak_print() {
    var jabatan = $('#data_jabatan').val();
    var nama = $('#data_penanggung_jawab').val();
    window.open('<?php echo base_url() ?>admin_gejala/cetak?jabatan=' + jabatan + '&nama=' + nama, '_blank');
  }
</script>



<style type="text/css">
  .ui-front {
    z-index: 1100;
  }
</style>



<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Input Gejala</h5>
      </div>
      <div class="modal-body">
        <form id="id_form">
          <input type="hidden" id="kode" name="kode">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Gejala :</label>
            <textarea class="form-control" id="nama_gejala" name="nama_gejala" rows="2"></textarea>
          </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" id="bt_simpan" name="bt_simpan" onclick="save()"> Simpan</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="modal_form_hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Konfirmasi Hapus</h5>
      </div>
      <div class="modal-body">
        <form id="id_form_hapus">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Masukan Ulang Password Login Anda:</label>
            <input type="password" class="form-control" id="password" name="password">
            <input type="hidden" id="solusi_id" name="solusi_id">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" onclick="simpan_hapus()"> Hapus</button>
      </div>
    </div>
  </div>
</div>



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