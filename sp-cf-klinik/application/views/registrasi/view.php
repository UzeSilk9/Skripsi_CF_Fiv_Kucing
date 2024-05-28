<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registrasi Siswa Baru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Registrasi Siswa Baru</li>
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
                            <form id="formregistrasi" accept-charset="utf-8" action="" enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-6">

                                        <table style="width: 100%;">
                                            <tr>
                                                <td colspan="2">
                                                    <input type="hidden" id="no_pend" name="no_pend">
                                                    <div class="form-group">
                                                        <label for="inputDescription">Nama Lengkap *</label>
                                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Tempat Lahir *</label>
                                                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Tanggal Lahir *</label>
                                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Jenis Kelamin *</label>
                                                        <select id="jenkel" name="jenkel" class="form-control" data-live-search="true">
                                                            <option value="">Pilih</option>
                                                            <option value="Laki-laki">Laki-laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">NISN *</label>
                                                        <input type="text" id="nisn" name="nisn" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">NIK *</label>
                                                        <input type="text" id="nik" name="nik" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Hobi</label>
                                                        <input type="text" id="hobi" name="hobi" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Cita-cita</label>
                                                        <input type="text" id="cita_cita" name="cita_cita" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nilai Matematika Smt I Kls VI *</label>
                                                        <input type="number" id="nilai_rapor_mtk" name="nilai_rapor_mtk" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nilai IPA Smt I Kls VI *</label>
                                                        <input type="number" id="nilai_rapor_ipa" name="nilai_rapor_ipa" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nilai B. Indonesia Smt I Kls VI *</label>
                                                        <input type="number" id="nilai_rapor_bindo" name="nilai_rapor_bindo" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Peringkat Kelas Smt I Kls VI</label>
                                                        <input type="number" id="peringkat_kelas" name="peringkat_kelas" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Anak Ke</label>
                                                        <input type="number" id="anak_ke" name="anak_ke" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Jumlah Saudara</label>
                                                        <input type="number" id="jumlah_saudara" name="jumlah_saudara" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">KKS/PKH/KIP</label>
                                                        <select id="kks_pkh_kip" name="kks_pkh_kip" class="form-control" data-live-search="true">
                                                            <option value="">Pilih</option>
                                                            <option value="KKS">KKS</option>
                                                            <option value="PKH">PKH</option>
                                                            <option value="KIP">KIP</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nomor KKS/PKH/KIP</label>
                                                        <input type="text" id="kks_pkh_kip_nomor" name="kks_pkh_kip_nomor" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Status Tempat Tinggal</label>
                                                        <select id="status_tempat_tinggal" name="status_tempat_tinggal" class="form-control" data-live-search="true">
                                                            <option value="">Pilih</option>
                                                            <option value="Dengan Orang Tua">Dengan Orang Tua</option>
                                                            <option value="KOS">KOS</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Alamat</label>
                                                        <input type="text" id="alamat" name="alamat" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" onclick="sekolah_asal()" class="btn btn-primary">Cari Seklah Asal</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Sekolah Asal *</label>
                                                        <input type="text" id="kd_sekolah" name="kd_sekolah" class="form-control" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Alamat Sekolah Asal</label>
                                                        <input type="text" id="kd_sekolah_alamat" name="kd_sekolah_alamat" class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">NPSN Sekolah Asal</label>
                                                        <input type="text" id="kd_sekolah_npsn" name="kd_sekolah_npsn" class="form-control" readonly>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nomor Peserta UN</label>
                                                        <input type="text" id="no_peserta_un" name="no_peserta_un" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-6">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nomor Kartu Keluarga</label>
                                                        <input type="text" id="nomor_kk" name="nomor_kk" class="form-control">
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nama Ayah Kandung *</label>
                                                        <input type="text" id="nama_ayah" name="nama_ayah" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Tanggal Lahir Ayah</label>
                                                        <input type="date" id="ayah_tgl_lahir" name="ayah_tgl_lahir" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Status Ayah</label>
                                                        <select id="ayah_status" name="ayah_status" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="Hidup">Masih Hidup</option>
                                                            <option value="Meninggal">Sudah Meninggal</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">NIK Ayah</label>
                                                        <input type="text" id="ayah_nik" name="ayah_nik" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Pendidikan Ayah</label>
                                                        <input type="text" id="ayah_pendidikan" name="ayah_pendidikan" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Pekerjaan Ayah</label>
                                                        <input type="text" id="ayah_pekerjaan" name="ayah_pekerjaan" class="form-control">
                                                    </div>
                                                </td>

                                            </tr>


                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Nama Ibu Kandung *</label>
                                                        <input type="text" id="nama_ibu" name="nama_ibu" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Tanggal Lahir Ibu</label>
                                                        <input type="date" id="ibu_tgl_lahir" name="ibu_tgl_lahir" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Status Ibu</label>
                                                        <select id="ibu_status" name="ibu_status" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="Hidup">Masih Hidup</option>
                                                            <option value="Meninggal">Sudah Meninggal</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">NIK Ibu</label>
                                                        <input type="text" id="ibu_nik" name="ibu_nik" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Pendidikan Ibu</label>
                                                        <input type="text" id="ibu_pendidikan" name="ibu_pendidikan" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Pekerjaan Ibu</label>
                                                        <input type="text" id="ibu_pekerjaan" name="ibu_pekerjaan" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Rata-rata Penghasilan Orang Tua Perbulan</label>
                                                        <select id="penghasilan_ortu" name="penghasilan_ortu" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="1">Kurang dari Rp. 500.000</option>
                                                            <option value="2">Rp. 500.000 - Rp. 1000.000</option>
                                                            <option value="3">Rp. 1.000.000 - Rp. 2.000.000</option>
                                                            <option value="4">Rp. 2.000.000 - Rp. 3.000.000</option>
                                                            <option value="5">Rp. 3.000.000 - Rp. 5.000.000</option>
                                                            <option value="6">Lebih dari Rp. 5.000.000</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">NoHP Orang Tua *</label>
                                                        <input type="text" id="nohp" name="nohp" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label for="inputName">Alamat Orang Tua</label>
                                                        <input type="text" id="alamat_ortu" name="alamat_ortu" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Username *</label>
                                                        <input type="text" id="username" name="username" class="form-control" onkeyup="cekkode()">
                                                        <span id="pesan"></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="inputName">Password *</label>
                                                        <input type="text" id="userpassword" name="userpassword" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="row">
                                        <div class="pull-right">
                                            <button type="button" id="save" name="save" onclick="simpan()" data-loading-text="Menyimpan" class="btn btn-info pull-right" disabled>Simpan</button>
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































<script type="text/javascript">
    function sekolah_asal() {
        $('#modal_form').modal('show');
    }


    function pilih(npsn, sekolah, alamat) {
        $("#kd_sekolah").val(sekolah);
        $("#kd_sekolah_alamat").val(alamat);
        $("#kd_sekolah_npsn").val(npsn);
        $('#modal_form').modal('hide');
    }

    function simpan() {
        var url;
        url = '<?php echo base_url('registrasi/simpan'); ?>';
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#formregistrasi').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status != 'fail') {
                    alert(data.message);
                    window.location.href = "<?php echo base_url(); ?>";
                } else {
                    var message = "";
                    $.each(data.error, function(index, value) {
                        message += value;
                    });
                    toastr.error(message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Error Simpan / Update data ...!');
            }
        })
    }







    function cekkode() {
        var username = $("#username").val();
        $("#pesan").html("Cek username ...");
        if (username == '') {
            $("#pesan").html("username tidak boleh kosong");
            $("#username").css('border', '3px #C33 solid');

        } else {
            $.ajax({
                url: "<?php echo base_url('registrasi/cekkode/'); ?>" + username,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.user == '0') {
                        $("#pesan").html('');
                        $("#username").css('border', '3px #090 solid');
                        document.getElementById("save").disabled = false;
                    } else {
                        $("#pesan").html("username telah digunakan..!");
                        $("#username").css('border', '3px #C33 solid');
                        document.getElementById("save").disabled = true;
                    }
                }
            })
        }


    }
</script>











<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal_title" id="exampleModalLabel">Input User</h5>


            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NPSN</th>
                            <th>Nama Sekolah</th>
                            <th>Alamat</th>
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
                                <td><?php echo $user->npsn; ?></td>
                                <td><?php echo $user->sekolah; ?></td>
                                <td><?php echo $user->alamat_jalan; ?></td>
                                <td>
                                    <button class="btn btn-primary btn-flat" onclick="pilih('<?php echo  $user->npsn; ?>','<?php echo  $user->sekolah; ?>','<?php echo  $user->alamat_jalan; ?>')">Pilih</button>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
            </div>
        </div>
    </div>
</div>