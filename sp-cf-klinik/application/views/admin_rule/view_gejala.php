<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php
          $penyakit = '';
          foreach ($daftar as $user) {
            $penyakit = $user->nama_penyakit;
          }
          ?>
          <h1 class="m-0 text-dark">Data Gejala : <?php echo $penyakit; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item">Data Gejala</li>
            <li class="breadcrumb-item active"><?php echo $penyakit; ?></li>
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
                <!-- <button type="button" class="btn btn-primary btn-flat" onclick="download()"> Download</button>
                <button type="button" class="btn btn-primary btn-flat" onclick="cetak()"> Cetak</button> -->
                <button type="button" class="btn btn-primary btn-flat" onclick="kembali()"> Kembali</button>
              </div>

              <p><b>Petunjuk Pengisian Rule</b></p>
              <p>Silahkan pilih gejala yang sesuai dengan penyakit, dan berikan nilai CF(Pakar) dengan cakupan</p>
              <p>1 = Sangat Yakin, 0.8 = Yakin, 0.6 = Cukup Yakin, 0.4 = Kurang Yakin, 0.2 = Tidak Tahu, 0 = Tidak<br>
                CF(Pakar) = MB - MD<br>
                MB = Ukuran kepercayaan terhadap hipotesa (measure of increased belief), MD = Ukuran ketidak percayaan terhadap hipotesa (measure of increased disbelief)(</p>

              <p>Contoh <br>
                Jika kepercayaan (MB) gejala terhadap suatu penyakit adalah 0.8, dan ketidak percayaan gejala tersebut terhadap penyakit tersebut adalah 0.2<br>
                Maka CF(Pakar) = MB - MD (0.8 - 0.6) = 0.6, dimana nilai kepastian nilai CF(Pakar) hubungan antar gejala dan penyakit tersebut adalah 0.6 (Cukup Yakin).</p>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped" style="font-size: 13px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Rule ID</th>
                    <th>Gejala</th>
                    <th>MB</th>
                    <th>MD</th>
                    <th>CF(Pakar)</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  foreach ($daftar as $user) {
                    $no++;
                    if ($user->id_gejala) {
                  ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $user->rule_id; ?></td>
                        <td><?php echo $user->nama_gejala; ?></td>
                        <td><?php echo number_format($user->rule_mb, 1, ",", "."); ?></td>
                        <td><?php echo number_format($user->rule_md, 1, ",", "."); ?></td>
                        <td><?php echo number_format($user->rule_cf, 1, ",", "."); ?></td>
                        <td>
                          <?php $id = $user->rule_id; ?>


                          <button class="btn btn-danger fa fa-trash-o btn-flat" onclick="hapus('<?php echo $id ?>')"><i class="fa fa-trash"></i></button>

                        </td>
                      </tr>
                  <?php
                    }
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
    var rule_gejala_id_gejala = $('#rule_gejala_id_gejala').val();
    var rule_gejala_cf = $('#rule_gejala_cf').val();

    if (rule_gejala_id_gejala.trim() == '') {
      alert('Pilih Gejala.');
      $('#rule_gejala_id_gejala').focus();
      return false;
    } else if (rule_gejala_cf.trim() == '') {
      alert('Isikan nilai MB dan MD');
      $('#rule_mb').focus();
      return false;
    } else {
      var url;
      if (save_mothod == 'add') {
        url = '<?php echo base_url('admin_rule/simpan_gejala'); ?>';
      } else {
        url = '<?php echo base_url('admin_rule/simpanedit_gejala'); ?>';
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

      $('[name="rule_id_gejala"]').val(id);

    }
  }



  function simpan_hapus() {
    var password = $('#password').val();

    if (password.trim() == '') {
      alert('Masukan ulang password login anda..! ');
      $('#password').focus();
      return false;

    } else {
      var url = '<?php echo base_url('admin_rule/hapus_gejala'); ?>';
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
      url: "<?php echo base_url('admin_rule/edit_gejala/'); ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="kode"]').val(data.rule_id_gejala);
        $('[name="rule_gejala_id_gejala"]').val(data.rule_gejala_id_gejala);
        $('[name="rule_gejala_cf"]').val(data.rule_gejala_cf);
        $('[name="rule_mb"]').val(data.rule_mb);
        $('[name="rule_md"]').val(data.rule_md);
        $('#modal_form').modal('show');
        $('.modal_title').text('Edit Rule');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error GET data from Ajax ...!')
      }

    });
  }




  function hitung_cf() {
    var rule_mb = $('[name="rule_mb"]').val();
    var rule_md = $('[name="rule_md"]').val();
    $('[name="rule_gejala_cf"]').val((eval(rule_mb) - eval(rule_md)).toFixed(1));
  }





  function download() {
    window.location.href = "<?php echo base_url('admin_rule/download/') ?>";
  }

  function kembali() {
    window.location.href = "<?php echo base_url('admin_rule/') ?>";
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
        <h5 class="modal_title" id="exampleModalLabel">Input Gejala</h5>


      </div>
      <div class="modal-body">

        <form id="id_form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Gejala :</label>
            <select class="form-control" id="rule_gejala_id_gejala" name="rule_gejala_id_gejala">
              <option value=""></option>
              <?php
              foreach ($gejala as $peg) {
                echo "<option value='" . $peg->id_gejala . "'>" . $peg->nama_gejala . "</option>";
              }
              ?>
            </select>
            <input type="hidden" name="rule_id" id="rule_id" value="<?php echo $rule_id; ?>">
            <input type="hidden" id="kode" name="kode">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Measure of Increased Belief (MB) :</label>
            <input type="number" class="form-control" id="rule_mb" name="rule_mb" onkeyup="hitung_cf()">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Measure of Increased Disbelief (MD) :</label>
            <input type="number" class="form-control" id="rule_md" name="rule_md" onkeyup="hitung_cf()">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">CF(Pakar) :</label>
            <input type="number" class="form-control" id="rule_gejala_cf" name="rule_gejala_cf">
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
            <input type="hidden" id="rule_id_gejala" name="rule_id_gejala">
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