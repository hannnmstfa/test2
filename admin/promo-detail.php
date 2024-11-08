<!DOCTYPE html>
<html>
<head>
	<title>Edit Promo</title>
	<link rel="icon" type="image/png" href="../img/logo1.png">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<style>
		th{
			background-color: yellow;
		}
	</style>
</head>
<header>
	<nav class="navbar">
		<div class="logo">
			<a href="index.php">
				<img src="../img/logo1.png" alt="Logo">
			</a>
		</div>
		<div class="btn-nav2">
		<a href="index.php">
				<button class="hover-button">Kembali</button>
			</a>
			<a href="admin.php">
				<button class="hover-button">Dashboard</button>
			</a>
		</div>
	</nav>
</header>
<body>
	<center>
		<h1><i><u>Informasi Foto Slide Promo</u></i></h1>
		<table border="3" width="80%" bgcolor="white">
			<th width="5%">No</th>
			<th width="30%">Foto</th>
			<th>Nama Foto</th>
			<th>Action</th>
			<?php
			include '../koneksi.php';
			$no = 1;
			$select = mysqli_query($conn, "SELECT * FROM promo");
			if(mysqli_num_rows($select) > 0) {
				while($hasil = mysqli_fetch_array($select)){
			?>

			<tr align="center">
				<td><?php echo $no++ ?></td>
				<td><img width="30%" src="../img/<?php echo $hasil['foto'] ?>"></td>
				<td><?php echo $hasil['foto'] ?></td>
				<td style="text-decoration: underline;"><a href="edit-prm.php?foto=<?php echo $hasil['foto']?>"><i class="fas fa-edit"></i>Edit</a></td>
			</tr>
			<?php }} ?>
		</table>
	</center>

</body>
</html>