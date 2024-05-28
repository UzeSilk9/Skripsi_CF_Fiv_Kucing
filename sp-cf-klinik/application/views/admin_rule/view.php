<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Rule</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Data Rule</li>
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
              <table id="example1" class="table table-bordered table-striped" style="font-size: 13px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Rule ID</th>
                    <th>penyakit</th>
                    <th>Gejala</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($daftar as $user) {
                    $no++;

                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $user->rule_id; ?></td>
                      <td><?php echo $user->nama_penyakit; ?></td>
                      <td><?php echo $user->JUMLAH; ?></td>
                      <td>
                        <?php $id = $user->id_penyakit; ?>

                        <button class="btn btn-warning btn-flat" onclick="edit('<?php echo $id ?>')"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-info fa fa-folder btn-flat" onclick="gejala('<?php echo $id ?>')"></button>
                        <button class="btn btn-danger fa fa-trash-o btn-flat" onclick="hapus('<?php echo $id ?>')"><i class="fa fa-trash"></i></button>

                      </td>
                    </tr>
                  <?php
                  } ?>

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
    var rule_id_penyakit = $('#rule_id_penyakit').val();

    if (rule_id_penyakit.trim() == '') {
      alert('Pilih penyakit.');
      $('#rule_id_penyakit').focus();
      return false;
    } else {
      var url;
      if (save_mothod == 'add') {
        url = '<?php echo base_url('admin_rule/simpan'); ?>';
      } else {
        url = '<?php echo base_url('admin_rule/simpanedit'); ?>';
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

      $('[name="rule_id"]').val(id);
    }
  }



  function simpan_hapus() {
    var password = $('#password').val();

    if (password.trim() == '') {
      alert('Masukan ulang password login anda..! ');
      $('#password').focus();
      return false;

    } else {
      var url = '<?php echo base_url('admin_rule/hapus'); ?>';
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
      url: "<?php echo base_url('admin_rule/edit/'); ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="kode"]').val(data.id_penyakit);
        $('[name="rule_id_penyakit"]').val(data.id_penyakit);

        $('#modal_form').modal('show');
        $('.modal_title').text('Edit Rule');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error GET data from Ajax ...!')
      }

    });
  }









  function download() {
    window.location.href = "<?php echo base_url('admin_rule/download/') ?>";
  }

  function gejala(id) {
    window.location.href = "<?php echo base_url('admin_rule/gejala/') ?>" + id;
  }


  function cetak() {
    window.open('<?php echo base_url() ?>admin_rule/cetak', '_blank');
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
        <h5 class="modal_title" id="exampleModalLabel">Input Rule</h5>
      </div>


      <div class="modal-body">
        <form id="id_form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">penyakit :</label>
            <select class="form-control" id="rule_id_penyakit" name="rule_id_penyakit">
              <option value=""></option>
              <?php
              foreach ($penyakit as $peg) {
                echo "<option value='" . $peg->id_penyakit . "'>" . $peg->nama_penyakit . "</option>";
              }
              ?>
            </select>
            <input type="hidden" id="kode" name="kode">
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
            <input type="hidden" id="rule_id" name="rule_id">
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