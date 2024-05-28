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

	<table align="center" width="100%">
		<tr>
			<td style="width: 15%"><img style="padding: 5px; width: 80px;" src="<?php echo base_url('aset/logo.png') ?>"></td>
			<td style="width: 70%" style="text-align: center;" align="center">
				<b><br>KEMENTRIAN AGAMA REPUBLIK INDONESIA
					KANTOR KEMENTRIAN AGAMA KAB. PASAMAN<br>
					MADRASAH TSANAWIYAH NEGERI 4 PASAMAN<br></b>
			</td>
			<td style="width: 15%"></td>
		</tr>
		<tr>
			<td colspan="3" padding="0">
				<hr />
			</td>
		</tr>
	</table>
	<h3 align="center">LAPORAN DATA PENDAFTARAN SISWA BARU</h3>
	<h3 align="center">TAHUN PELAJARAN : <?php echo $tahun; ?></h3>
	<!-- <p style="margin-left: 5%"></p> -->
	<table border cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
		<tr style="text-align: center; font-weight: bold;">
			<td>No</td>
			<td>No. Pend</td>
			<td>NISN</td>
			<td>Nama Lengkap</td>
			<td>Tempat Tanggal Lahir</td>
			<td>Sekolah Asal</td>
			<td>Alamat</td>
			<th>Nilia MTK</th>
			<th>Nilai IPA</th>
			<th>Nilai B. Indonesia</th>
			<th>Peringkat Kelas</th>
			<td>Ket</td>
		</tr>
		<?php
		$no = 0;
		$total = 0;
		foreach ($data as $user) {
			$no++;
		?>
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $user->no_pend; ?></td>
				<td><?php echo $user->nisn; ?></td>
				<td><?php echo $user->nama_lengkap; ?></td>
				<td><?php echo $user->tempat_lahir; ?>, <?php echo $user->tanggal_lahir; ?></td>
				<td><?php echo $user->sekolah; ?></td>
				<td><?php echo $user->alamat; ?></td>
				<td><?php echo $user->nilai_rapor_mtk; ?></td>
				<td><?php echo $user->nilai_rapor_ipa; ?></td>
				<td><?php echo $user->nilai_rapor_bindo; ?></td>
				<td><?php echo $user->peringkat_kelas; ?></td>
				<td></td>
			</tr>

		<?php } ?>
	</table>
	<table border="0" cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
		<tr>
			<td>Jumlan Siswa Mendaftar : <?php echo $no; ?></td>
		</tr>
	</table>
	<br>

	<table align="center" width="80%" border="0">
		<tr>
			<td width="50%">&nbsp;&nbsp;</td>
			<td align="left">
				Pasaman, <?php echo date("d-M-Y") ?><br>
				Kepala Sekolah<br><br><br><br>
				( <?php echo $info->kepala_sekolah; ?> )
			</td>
		</tr>
	</table>
</body>

</html>