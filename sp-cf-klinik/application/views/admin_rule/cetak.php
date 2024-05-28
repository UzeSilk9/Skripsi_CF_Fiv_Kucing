<!DOCTYPE html>
<html>

<head>
	<title>Cetak Report</title>
	<link rel="icon" href="<?php echo base_url('aset'); ?>/logo.png" type="image/x-icon" />
	<style type="text/css">
		@page {
			margin: 10px;
		}
	</style>
</head>

<body onload="window.print()">

	<table border="0" align="center" width="90%" style="border-collapse: collapse;">
		<tr>
			<td style="width: 20%;">
				<img src="<?= base_url('aset/logo.png') ?>" style="width: 80px;">
			</td>
			<td align="center">
				<h3 style="margin: 0px;"> Klinik drh.Riri</h3>
			</td>
			<td align=" right" style="width: 20%;">
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<hr>
			</td>
		</tr>
	</table>
	<br>
	<h3 align="center">DATA RULE</h3>






	<table border cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
		<tr style="text-align: center; font-weight: bold;">
			<th>No</th>
			<th>Rule ID</th>
			<th>Penyakit ID</th>
			<th>Penyakit</th>
			<th>Gejala ID</th>
			<th>MB</th>
			<th>MD</th>
			<th>CF</th>
			<th>Bobot</th>
		</tr>
		<?php
		$no = 0;
		foreach ($daftar as $user) {
			$no++;
		?>

			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $user->rule_id; ?></td>
				<td><?php echo $user->id_penyakit; ?></td>
				<td><?php echo $user->nama_penyakit; ?></td>
				<td><?php echo $user->id_gejala; ?></td>
				<td><?php echo $user->nama_gejala; ?></td>
				<td><?php echo number_format($user->rule_mb, 1, ",", "."); ?></td>
				<td><?php echo number_format($user->rule_md, 1, ",", "."); ?></td>
				<td><?php echo number_format($user->rule_cf, 1, ",", "."); ?></td>
			</tr>
		<?php } ?>
	</table>
	<br>


</body>

</html>