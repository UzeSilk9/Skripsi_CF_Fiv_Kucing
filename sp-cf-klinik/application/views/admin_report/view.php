<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Report</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
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



        <div class="col-md-3 col-sm-6 col-12" style="cursor: pointer" onclick="data_pendafataran()">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Data Pendaftaran</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-12" style="cursor: pointer" onclick="hasil_seleksi()">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Laporan Hasil Seleksi</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


        <div class="col-md-3 col-sm-6 col-12" style="cursor: pointer" onclick="hasil_seleksi_kategori()">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Laporan Hasil Seleksi Kategori</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>









      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>























<script type="text/javascript">
  function data_pendafataran() {
    $('#id_form_data_pendafataran')[0].reset();
    $('#modal_form_data_pendafataran').modal('show');
  }


  function cetak_data_pendafataran() {
    var tahun = $('#data_pendafataran_tahun').val();
    window.open('<?php echo base_url() ?>admin_report/data_pendafataran/' + tahun, '_blank');
  }



  function hasil_seleksi() {
    $('#id_form_hasil_seleksi')[0].reset();
    $('#modal_form_hasil_seleksi').modal('show');
  }


  function cetak_hasil_seleksi() {
    var tahun = $('#hasil_seleksi_tahun').val();
    window.open('<?php echo base_url() ?>admin_report/hasil_seleksi/' + tahun, '_blank');
  }


  function hasil_seleksi_kategori() {
    $('#id_form_hasil_seleksi_kategori')[0].reset();
    $('#modal_form_hasil_seleksi_kategori').modal('show');
  }


  function cetak_hasil_seleksi_kategori() {
    var tahun = $('#hasil_seleksi_tahun_kategori').val();
    var kategori = $('#hasil_seleksi_tahun_kategori_kategori').val();
    window.open('<?php echo base_url() ?>admin_report/hasil_seleksi_kategori/' + tahun + 'z' + kategori, '_blank');
  }
</script>



<style type="text/css">
  .ui-front {
    z-index: 1100;
  }
</style>



<div class="modal fade" id="modal_form_data_pendafataran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Parameter</h5>
      </div>
      <div class="modal-body">
        <form id="id_form_data_pendafataran">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Pelajaran :</label>
            <select name="data_pendafataran_tahun" id="data_pendafataran_tahun" class="form-control">
              <option value="">Pilih</option>
              <?php
              foreach ($tahun as $t) {
                echo "<option value='" . $t->tahun . "'>" . $t->tahun . "</option>";
              }
              ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" onclick="cetak_data_pendafataran()"> Cetak</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modal_form_hasil_seleksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Parameter</h5>
      </div>
      <div class="modal-body">
        <form id="id_form_hasil_seleksi">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Pelajaran :</label>
            <select name="hasil_seleksi_tahun" id="hasil_seleksi_tahun" class="form-control">
              <option value="">Pilih</option>
              <?php
              foreach ($tahun as $t) {
                echo "<option value='" . $t->tahun . "'>" . $t->tahun . "</option>";
              }
              ?>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" onclick="cetak_hasil_seleksi()"> Cetak</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modal_form_hasil_seleksi_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal_title" id="exampleModalLabel">Parameter</h5>
      </div>
      <div class="modal-body">
        <form id="id_form_hasil_seleksi_kategori">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Pelajaran :</label>
            <select name="hasil_seleksi_tahun_kategori" id="hasil_seleksi_tahun_kategori" class="form-control">
              <option value="">Pilih</option>
              <?php
              foreach ($tahun as $t) {
                echo "<option value='" . $t->tahun . "'>" . $t->tahun . "</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tahun Pelajaran :</label>
            <select name="hasil_seleksi_tahun_kategori_kategori" id="hasil_seleksi_tahun_kategori_kategori" class="form-control">
              <option value="">Pilih</option>
              <option value="Lulus">Lulus</option>
              <option value="Cadangan">Cadangan</option>
              <option value="Gagal">Gagal</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat glyphicon glyphicon-remove-sign" data-dismiss="modal"> Tutup</button>
        <button type="button" class="btn btn-primary btn-flat glyphicon glyphicon-floppy-open" onclick="cetak_hasil_seleksi_kategori()"> Cetak</button>
      </div>
    </div>
  </div>
</div>