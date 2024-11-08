<?php
include '../koneksi.php';
$data_edit = mysqli_query($conn, "SELECT * FROM pemilik WHERE nim = '" . $_GET['nim'] . "'");
$result = mysqli_fetch_array($data_edit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Edit Data Pemilik</title>
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
        <h3><u>Form Edit Data Pemilik</u></h3>
        <table width="50%">
            <form method="POST">
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><input class="text" type="text" name="nim" value="<?php echo $result['nim'] ?>" required></td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan NIM Anda.</p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input class="text" type="text" name="nama" value="<?php echo $result['nama'] ?>" required></td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan nama lengkap Anda.</p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><input class="text" type="text" name="alamat" value="<?php echo $result['alamat'] ?>" required>
                    </td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan alamat lengkap Anda.</p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>WhatsApp</td>
                    <td>:</td>
                    <td><input class="text" type="text" name="wa" value="<?php echo $result['wa'] ?>" required></td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan Nomor WhatsApp yang di awali 08...</p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>:</td>
                    <td width="50%"><input type="text" name="ig" value="<?php echo $result['ig'] ?>"></td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan Username Instagram tanpa karakter @</p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>About Us</td>
                    <td>:</td>
                    <td width="50%"><textarea name="about" rows="4" cols="50"><?php echo $result['about'] ?></textarea>
                    </td>
                    <td>
                        <font>
                            <p class="p-sp">*Masukkan sejarah singkat usaha Anda.</p>
                        </font>
                    </td>
                </tr>
                <tr class="btn-nav2">
                    <td colspan="3"><input class="hover-button" type="submit" name="edit" value="SIMPAN PERUBAHAN"></td>
                </tr>
        </table>
    </center>
    </form>
    <?php
    include '../koneksi.php';
    if (isset($_POST['edit'])) {
        $nim = mysqli_real_escape_string($conn, $_POST['nim']);
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
        $wa = mysqli_real_escape_string($conn, $_POST['wa']);
        $ig = mysqli_real_escape_string($conn, $_POST['ig']);
        $about = mysqli_real_escape_string($conn, $_POST['about']);

        // Update data ke database
        $update = mysqli_query($conn, "UPDATE pemilik SET nama='$nama', alamat='$alamat', wa='$wa', ig='$ig', about='$about' WHERE nim='" . $_GET['nim'] . "'");

        if ($update) {
            echo "<script>
                    alert('Data berhasil diubah!...');
                    window.location.href = 'admin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data gagal disimpan: ' . mysqli_error($conn));
                    header('location:adm-edit.php');
                  </script>";
        }
    }
    ?>
</body>

</html>