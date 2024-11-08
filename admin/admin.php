<?php
include '../koneksi.php';
$select = mysqli_query($conn, "SELECT * FROM pemilik,login");
$hasil = mysqli_fetch_array($select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
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
		<div class="btn-nav">
			<a href="index.php">
				<button class="hover-button">Kembali</button>
			</a>
		</div>
	</nav>
</header>
<!--------------------------------------------------------------------->

<body>
	<center>
		<h2><i>Informasi Singkat Pemilik</i></h2>
		<br>
		<table width="60%">
			<tr>
				<td>Username</td>
				<td align="center">:</td>
				<td>
					<?php echo $hasil['username']; ?>
				</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td align="center">:</td>
				<td>
					<?php echo $hasil['nim']; ?>
				</td>
			</tr>
			<tr>
				<td width="20%">Nama</td>
				<td width="2%" align="center">:</td>
				<td>
					<?php echo $hasil['nama'] ?>
				</td>
			</tr>
			<tr>
				<td width="20%">Alamat</td>
				<td width="2%" align="center">:</td>
				<td>
					<?php echo $hasil['alamat'] ?>
				</td>
			</tr>
			<tr>
				<td width="20%">WhatsApp</td>
				<td width="2%" align="center">:</td>
				<td>
					<?php echo $hasil['wa'] ?>
				</td>
			</tr>
			<tr>
				<td width="20%">Instagram</td>
				<td width="2%" align="center">:</td>
				<td>
					@<?php echo $hasil['ig'] ?>
				</td>
			</tr>
			<tr style="vertical-align: top;">
				<td>About Us</td>
				<td align="center">:</td>
				<td style="text-align: justify;">
					<?php echo $hasil['about']; ?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div>
						<a style="margin-right: 20px; margin-left: 20px"
							href="adm-edit.php?nim=<?php echo $hasil['nim'] ?>">
							<button class="hover-button">Edit Data Pemilik</button>
						</a>
						<a style="margin-right: 20px; margin-left: 20px"
							href="admin-edit.php?username=<?php echo $hasil['username'] ?>">
							<button class="hover-button">Edit Admin</button>
						</a>
						<a href="../index.php" style="margin-left: 20px">
							<button class="hover-button">Logout</button>
						</a>
					</div>
				</td>
			</tr>
		</table>
	</center>

</body>

</html>