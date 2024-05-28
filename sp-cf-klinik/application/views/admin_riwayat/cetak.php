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


	<h3 align="center">DATA GEJALA</h3>
	<table border cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
		<tr style="text-align: center; font-weight: bold;">
			<td>No</td>
			<td>Gejala ID</td>
			<td>Nama</td>
		</tr>
		<?php
		$no = 0;
		foreach ($daftar as $user) {
			$no++; ?>

			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $user->id_gejala; ?></td>
				<td><?php echo $user->nama_gejala; ?></td>
			</tr>
		<?php } ?>
	</table>

	<br>


</body>

</html>