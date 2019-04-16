<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {margin : 160px}
    </style>
</head>

<body>
    <h2 align="center">Preview Data Proprerti</h2>
    <table border="1" style="width:100%">
        <tr align="center">
            <td>Nama Properti</td>
            <td>Jenis </td>
            <td>Rayon</td>
            <td>Luas Tanah</td>
            <td>Luas Bangunan</td>
            <td>Harga</td>
            <td>Tahun Perolehan</td>
            <td>Keterangan</td>
            <td>No Sertifikat</td>
            <td>Tanggal Berlaku Sertifikat</td>
            <td>Tanggal Kadaluarsa Sertifikat</td>
            <td>No Pajak</td>
            <td>alamat</td>
            <td>lokasi</td>
            <td>Status</td>
        </tr>

        <?php foreach ($properti as $value): ?>
        <tr>
            <td><?php echo $value->nama_properti?></td>
            <td><?php echo $value->jenis_properti?></td>
            <td><?php echo $value->nama_rayon?></td>
            <td><?php echo $value->luas_tanah?></td>
            <td><?php echo $value->luas_bangunan?></td>
            <td><?php echo $value->harga?></td>
            <td><?php echo $value->tahun_perolehan?></td>
            <td><?php echo $value->keterangan?></td>
            <td><?php echo $value->no_sertifikat?></td>
            <td><?php echo $value->tanggal_berlaku_sertifikat?></td>
            <td><?php echo $value->tanggal_kadaluarsa_sertifikat?></td>
            <td><?php echo $value->no_pajak?></td>
            <td><?php echo $value->alamat?></td>
            <td><?php echo $value->lokasi?></td>
            <td><?php echo $value->status?></td>
        </tr>
        <?php endforeach ?>

    </table>
</body>

</html>

