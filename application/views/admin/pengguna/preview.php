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
    <h2 align="center">Preview Data Pengguna</h2>
    <table border="1" style="width:100%">
        <tr align="center">
            <td>Id Admin</td>
            <td>username</td>
            <td>password</td>
            <td>level</td>
            <td>rayon</td>
        </tr>
        <?php foreach ($pengguna as $value): ?>
        <tr>
            <td><?php echo $value->id_admin?></td>
            <td><?php echo $value->username?></td>
            <td><?php echo $value->password?></td>
            <td><?php echo $value->id_level?></td>
            <td><?php echo $value->id_rayon?></td>
        </tr>
        <?php endforeach ?>

    </table>
</body>

</html>