  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="">PENERAPAN SISTEM PAKAR METODE CERTAINTY FACTOR UNTUK DIAGNOSA DINI PENGOBATAN VIRUS IMUNODEFISIENSI KUCING (FIV)
PADA KLINIK DRH. RIRI</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



  <!-- jQuery -->
  <script src="<?php echo base_url('aset/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url('aset/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('aset/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- alert -->
  <script src="<?php echo base_url('aset/') ?>plugins/toastr/toastr.min.js"></script>

  <!-- DataTables -->
  <script src="<?php echo base_url('aset/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('aset/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('aset/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url('aset/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- AdminLTE App -->
  <script src="<?php echo base_url('aset/') ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('aset/') ?>dist/js/demo.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $('#example3').DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example4').DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example5').DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>




  <script>
    // A $( document ).ready() block.
    $(document).ready(function() {
      <?php if ($this->session->flashdata('pesan')) { ?>
        alert('<?= $this->session->flashdata('pesan'); ?>');
      <?php } ?>
    });
  </script>





  </body>

  </html>