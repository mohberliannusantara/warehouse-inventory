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
    <h2 align="center">Preview Data Barang</h2>
    <table border="1" style="width:100%">
        <tr align="center">
            <td>Nama</td>
            <td>Harga</td>
            <td>Jenis Barang</td>
            <td>Kondisi</td>
            <td>Keterangan</td>
        </tr>

        <?php foreach ($barang as $value): ?>
        <tr>
            <td><?php echo $value->nama_barang?></td>
            <td><?php echo $value->nama_jenis_barang?></td>
            <td><?php echo $value->nama_kondisi?></td>
            <td><?php echo $value->harga?></td>
            <td><?php echo $value->keterangan2?></td>
        </tr>
        <?php endforeach ?>

    </table>
</body>

</html>