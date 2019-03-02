<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<tr>
			<td>Luas</td>
			<td>Harga</td>
			<td>Keterangan</td>
			<td>No Sertifikat</td>
			<td>Lokasi</td>
			<td>Gambar</td>
		</tr>
		
		<?php foreach ($data as $value): ?>
			<tr>
			<td><?php echo $value->luas?></td>
			<td><?php echo $value->harga?></td>
			<td><?php echo $value->keterangan?></td>
			<td><?php echo $value->no_sertifikat?></td>
			<td><?php echo $value->lokasi?></td>
			<td><img src="<?php echo $value->gambar?>">></td>
			</tr>	
		<?php endforeach ?>	
		
	</table>
</body>
</html>