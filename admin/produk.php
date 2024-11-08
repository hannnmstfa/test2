<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Produk</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link rel="icon" type="image/png" href="../img/logo1.png">
</head>
	<!-----HEADER--------------------->
<header>
	<nav class="navbar">
		<div class="logo">
			<a href="index.php">
				<img src="../img/logo1.png" alt="Logo">
			</a>
		</div>
		<div>
			<ul>
				<span><a href="index.php" class="a-menu">Home</a></span>
				<span><a href="produk.php" class="spesial-hvr">Produk</a></span>	
			</ul>
		</div>
		<div class="btn-nav2">
			<a href="produk-add.php">
				<button class="hover-button">Tambah Produk</button>
			</a>
			<a href="admin.php">
				<button class="hover-button">Dashboard</button>
			</a>
		</div>
	</nav>
</header>
	<!--------------------------------------------------------------------->

<body>
	<center>
		<table border="1" width="80%">
			<th>No</th>
			<th>Kode Unik</th>
			<th>Foto Produk</th>
			<th>Nama Produk</th>
			<th>Ukuran</th>
			<th>Stok</th>
			<th>Harga</th>
			<th colspan="2">Aksi</th>

			<?php
			include '../koneksi.php';
			$no = 1;
			$select = mysqli_query($conn, "SELECT * FROM produk");
			if(mysqli_num_rows($select) > 0) {
				while($hasil = mysqli_fetch_array($select)){
			?>

			<tr>
				<td align="center" width="5%"><?php echo $no++ ?></td>
				<td align="center" width="8%"><?php echo $hasil['kodeunik']; ?></td>
				<td width="15%" align="center"><img src="../fotoproduk/<?php echo $hasil['foto'] ?>" width="100%"></td>
				<td align="center"><?php echo $hasil['nama']; ?></td>
				<td align="center"><?php echo $hasil['ukuran']; ?></td>
				<td align="center"><?php echo $hasil['stok']; ?></td>
				<td align="center">Rp <?php echo $hasil['harga']; ?></td>
				<td width="4%" align="center"><a href="produk-edit.php?kodeunik=<?php echo $hasil['kodeunik']?>"><i class="fas fa-edit"></i></a></td>
				<td width="4%" align="center"><a href="produk-delete.php?kodeunik=<?php echo $hasil['kodeunik']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?php echo $hasil['nama'] ?>?')"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
		<?php }}?>

		</table>
	</center>


</body>
</html>
