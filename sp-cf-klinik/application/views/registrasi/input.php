<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registrasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Registrasi</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">


                            <form id="id_form" enctype="multipart/form-data">
                                <div class="col-md-6">

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


                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="pull-right col-sm-offset-2">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <button class="btn btn-block btn-danger btn-flat" onclick="window.location = '<?php echo base_url('login') ?>'">Kembali</button>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <input type="submit" class="btn btn-block btn-info btn-flat" value=" Submit">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </form>




                        </div>


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
















































<script src="<?php echo base_url('aset/') ?>tambahan/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
    function cekkode() {
        var user_username = $("#user_username").val();
        $("#pesan").html("Cek username ...");
        if (user_username == '') {
            $("#pesan").html("user_username tidak boleh kosong");
            $("#user_username").css('border', '3px #C33 solid');

        } else {
            $.ajax({
                url: "<?php echo base_url('registrasi/cekkode/'); ?>" + user_username,
                type: "GET",
                dataType: "JSON",



                success: function(data) {
                    if (data.user == '0') {
                        $("#pesan").html("");
                        $("#user_username").css('border', '3px #090 solid');
                    } else {
                        $("#pesan").html("username telah digunakan..!");
                        $("#user_username").css('border', '3px #C33 solid');
                    }
                }
            })
        }
    }


    $(document).ready(function() {
        $('#id_form').on('submit', function(e) {
            e.preventDefault();
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
                url = '<?php echo base_url('registrasi/simpan') ?>';
                $.ajax({
                    url: url,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        alert('Registrasi sukses..... Silahkan Login');
                        window.location.href = '<?php echo base_url('login') ?>';
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error Simpan data ...!')
                    }
                })
            }
        });


    });
</script>