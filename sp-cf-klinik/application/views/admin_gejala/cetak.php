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
	<h3 align="center">LAPORAN DATA GEJALA</h3>
	<table border cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
		<tr style="text-align: center; font-weight: bold;">
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

	<br>
	<table border="0" align="right" style="margin-right: 100px;">
		<tr>
			<td>
				Batusangkar, <?= date('d - M - Y') ?>
				<br>
				<?php if (isset($_GET['jabatan'])) {
					echo $_GET['jabatan'];
				} ?>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				( <?php if (isset($_GET['nama'])) {
						echo $_GET['nama'];
					} ?> )
			</td>
		</tr>
	</table>

</body>

</html>