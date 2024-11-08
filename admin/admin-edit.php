<?php
include '../koneksi.php';
$data_edit = mysqli_query($conn, "SELECT * FROM login WHERE username = '" . $_GET['username'] . "'");
$result = mysqli_fetch_array($data_edit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Edit Data Admin</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/png" href="../img/logo1.png">
    <style>
        input,
        button {
            margin: 5px auto;
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
            <a href="admin.php">
                <button class="hover-button">Kembali</button>
            </a>
        </div>
    </nav>
</header>

<body>

    <center>
        <h3><u>Form Edit Data Admin</u></h3>
        <table width="50%">
            <form method="POST">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input class="text" type="text" name="username" value="<?php echo $result['username'] ?>" required></td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan username.</p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input class="text" type="text" name="password" value="<?php echo $result['password'] ?>" required>
                    </td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan Password minimal 5 Karakter</p>
                        </font>
                    </td>
                <tr class="btn-nav2">
                    <td colspan="3"><input class="hover-button" type="submit" name="edit" value="SIMPAN PERUBAHAN"></td>
                </tr>
        </table>
    </center>
    </form>
    <?php
    include '../koneksi.php';
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Update data ke database
        $update = mysqli_query($conn, "UPDATE login SET username='$username', password='$password' WHERE username='" . $_GET['username'] . "'");

        if ($update) {
            echo "<script>
                    alert('Data berhasil diubah!...');
                    window.location.href = 'admin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data gagal disimpan: ' . mysqli_error($conn));
                    header('location:admin-edit.php');
                  </script>";
        }
    }
    ?>
</body>
</html>