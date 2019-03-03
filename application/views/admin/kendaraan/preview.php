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
    <h2 align="center">Preview Data Kendaraan</h2>
    <table border="1" style="width:100%">
        <tr align="center">
            <td>Nama Kendaraan</td>
            <td>Nomor Polisi</td>
            <td>Pengguna</td>
            <td>rayon</td>
            <td>nama_jenis_kendaraan</td>
            <td>stan_awal</td>
            <td>stan_akhir</td>
            <td>Keterangan</td>
            <td>vendor</td>
            <td>lama_berlaku</td>
            <td>status</td>
        </tr>

        <?php foreach ($kendaraan as $value): ?>
        <tr>
            <td><?php echo $value->nama_kendaraan?></td>
            <td><?php echo $value->nomor_polisi?></td>
            <td><?php echo $value->pengguna?></td>
            <td><?php echo $value->nama_rayon?></td>
            <td><?php echo $value->nama_rayon?></td>
            <td><?php echo $value->stan_awal?></td>
            <td><?php echo $value->stan_akhir?></td>
            <td><?php echo $value->keterangan2?></td>
            <td><?php echo $value->nama_pemilik_kendaraan?></td>
            <td><?php echo $value->lama_berlaku?></td>
            <td><?php echo $value->status?></td>
            
        </tr>
        <?php endforeach ?>

    </table>
</body>

</html>