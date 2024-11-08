<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<!--<link rel="stylesheet" type="text/css" href="style/image.css">-->
	<link rel="icon" type="image/png" href="img/logo1.png">
	<title>Daftar Sabun</title>
</head>

<!-----HEADER--------------------->
<header>
	<nav class="navbar">
		<div class="logo">
			<a href="index.php">
				<img src="img/logo1.png" alt="Logo">

			</a>
		</div>
		<div>
			<ul>
				<span><a href="index.php" class="a-menu">Home</a></span>
				<span><a href="sabun.php" class="spesial-hvr">Sabun</a></span>
				<span><a href="deterjen.php" class="a-menu">Deterjen</a></span>
				<span><a href="karbol.php" class="a-menu">Karbol</a></span>
				<span><a href="pewangi.php" class="a-menu">Pewangi</a></span>
			</ul>
		</div>
		<div class="btn-nav">
			<a href="login.php">
				<button class="hover-button">Login Admin</button>
			</a>
		</div>
	</nav>
</header>
<!--------------------------------------------------------------------->

<body>
	<div class="container-item">
		<?php
		include 'koneksi.php';
		$ambil = mysqli_query($conn, "SELECT * FROM pemilik");
		$pemilik = mysqli_fetch_array($ambil);
		$query = "SELECT nama, foto, ukuran,stok, harga FROM produk WHERE nama LIKE '%Lemon%' OR nama LIKE '%Sabun%'";
		$result = $conn->query($query);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

				?>

		<div class="item">
			<div class="item-container">
				<img class="produk" id="smallImage" src="fotoproduk/<?php echo $row["foto"]; ?>" width="100%">
			</div>
			<p class="p-sps">
				<?php echo $row["nama"]; ?>
			</p>
			<p class="p-sps1">Ukuran
				<?php echo $row["ukuran"]; ?>
			</p>
			<p class="p-sps1">Stok
				<?php echo $row["stok"]; ?>
			</p>
			<p class="p-sps" style="font-size: 13px; margin: 0;">Rp
				<?php echo $row["harga"]; ?>
			</p>
			<div class="beli-cnt">
				<a href="http://wa.me/<?php echo $pemilik['wa'] ?>" target="_blank">
					<button class="beli">Beli</button>
				</a>

			</div>

		</div>
		<?php }
		} ?>
	</div>
		<footer class="footer">
		<div class="about">
			<h2>About Us</h2>
			<p><?php echo $pemilik['about']; ?></p>
		</div>
		<div class="fot-garis">
			<div class="fot-alm">
				<a href="https://maps.app.goo.gl/cmHXbSuVLKLHVevi8" target="_blank">
					<p><i class="fa-solid fa-location-dot"></i><?php echo $pemilik['alamat'] ?> Kode Pos 59353</p>
				</a>
				<a href="http://wa.me/<?php echo $pemilik['wa'] ?>" target="_blank">
					<p><i class="fa-brands fa-whatsapp"></i><?php echo $pemilik['wa'] ?></p>
				</a>
				<a href="http://instagram.com/<?php echo $pemilik['ig'] ?>" target="_blank">
					<p><i class="fa-brands fa-instagram"></i>@<?php echo $pemilik['ig'] ?></p>
				</a>
			</div>
		</div>
	</footer>
	<div class="footer-bottom">
		<p>&copy; 2023 Sabun Kudus. All rights reserved.</p>
	</div>
	<!--<script src="js/imagezoom.js"></script>-->
</body>

</html>