<!DOCTYPE html>
<html lang="id-ID">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sabun Kudus</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="icon" type="image/png" href="img/logo1.png">
</head>

<body>
	<header>
		<nav class="navbar">
			<div class="logo">
				<a href="index.php">
					<img src="img/logo1.png" alt="Logo">
				</a>
			</div>
			<div>
				<ul>
					<span><a href="index.php" class="spesial-hvr">Home</a></span>
					<span><a href="sabun.php" class="a-menu">Sabun</a></span>
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

	<?php
			include 'koneksi.php';
			$select = mysqli_query($conn, "SELECT * FROM promo");
			?>

	<center>
		<div class="slider-container">
			<button class="prev" onclick="prevSlide()">&#10094;</button>
			<div class="slideku">
				<?php
                while ($hasil = mysqli_fetch_array($select)) {
                    echo '<div class="slide" style="background-image: url(\'img/' . $hasil['foto'] . '\');"></div>';
                }
                ?>
            </div>
			<button class="next" onclick="nextSlide()">&#10095;</button>
		</div>
	</center>
	<script src="js/script.js"></script>

	<div class="search-container">
		<form method="GET">
			<input type="text" name="search" placeholder="Cari produk..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>">
			<center>
				<button type="submit">Cari</button>
			</center>
			
		</form>
	</div>

	<div class="container-item">
		<?php
		include 'koneksi.php';

		$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

		if ($search) {
			$query = "SELECT nama, foto, ukuran, stok, harga FROM produk WHERE nama LIKE '%$search%'";
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
					<?php
				}
			} else {
				echo "<center><p>Produk tidak ditemukan.</p></center>";
			}
		} else {
			echo "<center><p>Masukkan kata kunci pencarian.</p></center>";
		}
		?>
	</div>
</body>

</html>
