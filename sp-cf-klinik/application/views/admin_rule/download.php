<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Rule.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>


<table>
  <tr>
    <td colspan="12" style="font-size: 20"><b>DATA RULE</b></td>
  </tr>
</table>
<br>


<table border="2">
  <thead>
    <tr>
      <th>No</th>
      <th>Rule ID</th>
      <th>Gejala</th>
      <th>MB</th>
      <th>MD</th>
      <th>CF(Pakar)</th>
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

        </tr>
    <?php
      }
    } ?>

  </tbody>


</table>