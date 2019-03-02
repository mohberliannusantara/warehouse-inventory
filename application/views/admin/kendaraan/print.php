<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<td>Nama</td>
			<td>No Plat</td>
			<td>Harga</td>
			<td>Kondisi</td>
			<td>Keterangan</td>
		</tr>
		
		<?php foreach ($data as $value): ?>
			<tr>
			<td><?php echo $value->nama_kendaraan?></td>
			<td><?php echo $value->plat?></td>
			<td><?php echo $value->harga?></td>
			<td><?php echo $value->nama_kondisi?></td>
			<td><?php echo $value->keterangan?></td>
			</tr>	
		<?php endforeach ?>	
		
	</table>
</body>
</html>