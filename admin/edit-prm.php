<?php
include '../koneksi.php';
$data_edit = mysqli_query($conn, "SELECT * FROM promo WHERE foto = '".$_GET['foto']."'");
$result = mysqli_fetch_array($data_edit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Edit Promo</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="icon" type="image/png" href="../img/logo1.png">
        <style>
        input, button {
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
        <a href="promo-detail.php">
                <button class="hover-button">Kembali</button>
            </a>
        </div>
    </nav>
</header> 
<body>
    
        <center>
            <h3><u>Form Edit Data Produk</u></h3>
            <table width="50%">
                <form method="POST" enctype="multipart/form-data">
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td><input class="text" type="file" name="foto"></td>
                </tr>
                <tr class="btn-nav2">
                    <td colspan="3"><input class="hover-button" type="submit" name="edit" value="SIMPAN PERUBAHAN"></td>
                </tr>
            </table>
        </center>
    </form>
    <?php
    include '../koneksi.php';
    if(isset($_POST['edit'])){

        // Periksa apakah ada file foto yang diunggah
        if (!empty($_FILES['foto']['name'])) {
            // Cek validasi format foto
            $filephoto = $_FILES["foto"]["name"];
            $extensifilevalid = ['jpg','jpeg','png'];
            $extensifile = explode('.', $filephoto);
            $extensifile = strtolower(end($extensifile));
            if (!in_array($extensifile, $extensifilevalid)) {
                echo "<script>
                        alert('Format File $filephoto Tidak Valid. Gagal Menyimpan...');
                        header('location:edit.php');
                     </script>";
                exit;
            }

            // Generate nama acak untuk file foto
            $namaAcak = uniqid().'.'.$extensifile;

            // Folder simpan gambar
            $folder = '../img/';

            // Hapus foto lama
            $fotoLama = $result['foto'];
            if (!empty($fotoLama) && file_exists($folder . $fotoLama)) {
                unlink($folder . $fotoLama);
            }

            // Pindahkan foto baru ke lokasi yang ditentukan
            if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $folder . $namaAcak)) {
                echo "<script>
                        alert('Gagal upload foto. Gagal Menyimpan...');
                      	header('location:edit.php');
                     </script>";
                exit;
            }
        } else {

            // Jika tidak ada foto baru diunggah, gunakan foto lama
            $namaAcak = $result['foto'];
        }

        // Update data ke database
        $update = mysqli_query($conn, "UPDATE promo SET foto='$namaAcak' WHERE foto='".$_GET['foto']."'");

        if($update){
            echo "<script>
                    alert('Data berhasil diubah!...');
                    window.location.href = 'index.php';
                  </script>";
        } else{
            echo "<script>
                    alert('Data gagal disimpan: ' . mysqli_error($conn));
                    header('location:edit-prm.php');
                  </script>";
        }
    }
    ?>
</body>
</html>
