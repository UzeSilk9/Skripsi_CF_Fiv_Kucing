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
    <h5 align="center">HASIL KONSULTASI</h5>
    <table>
        <tr>
            <td>Konsultasi ID</td>
            <td> : <?php echo $gejala[0]->id; ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td> : <?php echo $gejala[0]->tgl; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> : <?php echo $gejala[0]->nama; ?></td>
        </tr>
    </table>

    <h5><b>Hasil Diagnosa</b></h5>
    <?php foreach ($penyakit as $key) { ?>
        <table>
            <tr>
                <td>penyakit</td>
                <td> : <?php echo $key->nama_penyakit; ?></td> 
            </tr>
            <tr>
                <td>Similarity</td>
                <td> : <?php echo $total; ?> %</td>
            </tr>
            <tr>
                <td>Detail penyakit</td>
                <td> : <?php echo $key->ket; ?></td>
            </tr>
            <tr>
                <td>Solusi penyakit</td>
                <td> : <?php echo $key->solusi; ?></td>
            </tr>
        </table>
    <?php  }    ?>
    <h3><b>Gejala yang di Pilih</b></h3>
    <table border cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>Gejala yang Dialami</th>
                <th>Nilai CF</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($gejala as $gej) {
                $no++;
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $gej->nama_gejala; ?></td>
                    <td><?php echo $gej->detail_cf; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <h3>Hasil Diagnosa</h3>
    <!-- Minimal style -->
    <table border cellpadding="3" align="center" width="90%" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>No</th>
                <th>penyakit</th>
                <th>Kemungkinan %</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $keys = array_column($daftar, 'hasil');
            array_multisort($keys, SORT_DESC, $daftar);
            $no = 0;
            foreach ($daftar as $user) {
                $no++;
                if ($user['hasil'] > 0) {
            ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $user['nama_penyakit']; ?></td>
                        <td><?php echo $user['hasil']; ?></td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <?php
    if ($user = $this->session->userdata('groupnama') != 'User') { ?>
        <table border="0" align="right" style="margin-right: 100px;">
            <tr>
                <td>
                    Batusangkar <?= date('d - M - Y') ?>
                    <br>
                    <?php if (isset($_GET['jabatan'])) {
                        echo $_GET['jabatan'];
                    } ?>
                    <br>
                  
                    ( <?php if (isset($_GET['nama'])) {
                            echo $_GET['nama'];
                        } ?> )
                </td>
            </tr>
        </table>

    <?php }  ?>




</body>

</html>