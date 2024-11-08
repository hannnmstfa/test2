<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome</title>
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
				<span><a href="index.php" class="spesial-hvr">Home</a></span>
				<span><a href="produk.php" class="a-menu">Produk</a></span>
			</ul>
		</div>
		<div class="btn-nav2">
		<a href="promo-detail.php">
				<button class="hover-button">Edit Promo</button>
			</a>
			<a href="admin.php">
				<button class="hover-button">Dashboard</button>
			</a>
		</div>
	</nav>
</header>
	<!--------------------------------------------------------------------->

<body>
			<?php
			include '../koneksi.php';
			$select = mysqli_query($conn, "SELECT * FROM promo");
			?>

	<center>
		<div class="slider-container">
			<button class="prev" onclick="prevSlide()">&#10094;</button>
			<div class="slideku">
				<?php
                while ($hasil = mysqli_fetch_array($select)) {
                    echo '<div class="slide" style="background-image: url(\'../img/' . $hasil['foto'] . '\');"></div>';
                }
                ?>
            </div>
			<button class="next" onclick="nextSlide()">&#10095;</button>
		</div>
	</center>
	<script src="../js/script.js"></script>

</body>
</html>
