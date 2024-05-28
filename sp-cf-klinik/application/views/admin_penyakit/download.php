<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Penyakit.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>


<table>
  <tr>
    <td colspan="12" style="font-size: 20"><b>DATA PENYAKIT</b></td>
  </tr>
</table>
<br>


<table border="2">
  <tr>
    <th>No</th>
    <th>Penyakit ID</th>
    <th>Penyakit</th>
    <th>Ket</th>
    <th>Solusi</th>
  </tr>
  <?php
  $no = 0;
  foreach ($daftar as $user) {
    $no++; ?>

    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $user->id_penyakit; ?></td>
      <td><?php echo $user->nama_penyakit; ?></td>
      <td><?php echo $user->ket; ?></td>
      <td><?php echo $user->solusi; ?></td>
    </tr>
  <?php } ?>



</table>