<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style/style-login.css">
	<link rel="icon" type="image/png" href="img/logo1.png">
	<title>Login</title>
</head>
<header>
	<nav class="navbar">
		<div class="logo">
			<a href="index.php">
				<img src="img/logo1.png" alt="Logo">

			</a>
		</div>
		<div class="btn-nav">
			<a href="index.php">
				<button class="hover-button">Kembali</button>
			</a>
		</div>
	</nav>
</header>

<body>
	<div class="container">
		<div class="main-box">
			<h1>Login Admin</h1>
			<form action="validasi.php" method="post">
				<div class="input-box">
					<input type="username" name="username" required>
					<label>Username</label>
				</div>
				<div class="input-box">
					<input type="password" name="password" required>
					<label>Password</label>
				</div>
				<button type="submit" class="btn">Login</button>
				<br>
				<br>
				<p><i>*Halaman login khusus untuk admin</i></p>
			</form>
		</div>
	</div>
</body>

</html>