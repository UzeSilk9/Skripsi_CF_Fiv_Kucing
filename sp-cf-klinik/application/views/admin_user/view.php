<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Dokter Hewan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Data Dokter Hewan</li>
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
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Username</th>
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
                      <td><?php echo $user->nama; ?></td>
                      <td><?php echo $user->alamat; ?></td>
                      <td><?php echo $user->umur; ?></td>
                      <td><?php echo $user->jk; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $user->username; ?></td>
                      <td>
                        <?php $id = $user->username; ?>
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
    document.getElementById("user_username").disabled = false;
    $('#modal_form').modal('show');

  }


  function save() {

    document.getElementById("user_username").disabled = false;
    var user_nama = $('#user_nama').val();
    var user_umur = $('#user_umur').val();
    var user_jk = $('#user_jk').val();
    var user_username = $('#user_username').val();
    var user_pass = $('#user_pass').val();

    if (user_nama.trim() == '') {
      alert('Masukan nama.');
      $('#user_nama').focus();
      return false;
    } else if (user_umur.trim() == '') {
      alert('Masukkan umur.');
      $('#user_umur').focus();
      return false;
    } else if (user_jk.trim() == '') {
      alert('Masukkan Jenis Kelamin.');
      $('#user_jk').focus();
      return false;
    } else if (user_username.trim() == '') {
      alert('Masukkan username.');
      $('#user_username').focus();
      return false;
    } else if (user_pass.trim() == '') {
      alert('Masukkan Password.');
      $('#user_pass').focus();
      return false;
    } else {


      var url;
      if (save_mothod == 'add') {
        url = '<?php echo base_url('admin_user/simpan'); ?>';
      } else {
        url = '<?php echo base_url('admin_user/simpanedit'); ?>';
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
      $.ajax({
        url: "<?php echo base_url('admin_user/hapus/'); ?>" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
          location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('Error saat menghapus data ...!')
        }
      })
    }
  }




  function edit(id) {
    save_mothod = 'edit';
    $('#id_form')[0].reset();
    document.getElementById("user_username").disabled = 'true';
    $.ajax({
      url: "<?php echo base_url('admin_user/edit/'); ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        $('[name="user_username"]').val(data.username);
        $('[name="user_nama"]').val(data.nama);
        $('[name="user_umur"]').val(data.umur);
        $('[name="user_jk"]').val(data.jk);
        $('[name="user_email"]').val(data.email);
        $('[name="user_alamat"]').val(data.alamat);

        $('#modal_form').modal('show');
        $('.modal_title').text('Edit User');

      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert('Error GET data from Ajax ...!')
      }

    });
  }




  function cekkode() {
    var username = $("#user_username").val();
    $("#pesan").html("Cek username ...");
    if (username == '') {
      $("#pesan").html("username tidak boleh kosong");
      $("#username").css('border', '3px #C33 solid');

    } else {
      $.ajax({
        url: "<?php echo base_url('admin_user/cekkode/'); ?>" + username,
        type: "GET",
        dataType: "JSON",



        success: function(data) {
          if (data.admin == '0') {
            $("#pesan").html('');
            $("#user_username").css('border', '3px #090 solid');
          } else {
            $("#pesan").html("username telah digunakan..!");
            $("#user_username").css('border', '3px #C33 solid');
          }
        }
      })
    }


  }
</script>







<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Input User</h5>


      </div>
      <div class="modal-body">
        <form id="id_form">
          <div class="form-group">
            <label>Nama*</label>
            <input type="text" class="form-control" name="user_nama" id="user_nama">
            </span>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" id="user_alamat" name="user_alamat">
          </div>
          <table>
            <tr>
              <td>
                <div class="form-group">
                  <label>Umur</label>
                  <input type="text" class="form-control" id="user_umur" name="user_umur">
                </div>
              </td>
              <td>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" id="user_jk" name="user_jk">
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </td>
            </tr>
          </table>

          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" id="user_email" name="user_email" style="width: 50%">
          </div>
          <div class="form-group">
            <label>Username*</label>
            <input type="text" class="form-control" id="user_username" name="user_username" style="width: 50%" onkeyup="cekkode()">
            <span id="pesan"></span>
          </div>
          <div class="form-group">
            <label>Password* :</label>
            <input type="password" class="form-control" id="user_pass" name="user_pass" style="width: 50%">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" onclick="save()"> Simpan</button>
      </div>
    </div>
  </div>
</div>