<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Penanganan.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>


<table>
  <tr>
    <td colspan="12" style="font-size: 20"><b>DATA GEJALA</b></td>
  </tr>
</table>
<br>


<table border="2">
  <tr>
    <th>No</th>
    <th>Gejala ID</th>
    <th>Gejala</th>
  </tr>
  <?php
  $no = 0;
  foreach ($daftar as $user) {
    $no++; ?>

    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $user->id_gejala; ?></td>
      <td><?php echo $user->nama_gejala; ?></td>
    </tr>
  <?php } ?>



</table>