<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Tambah Produk</title>
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
        <a href="produk.php">
                <button class="hover-button">Kembali</button>
            </a>
        </div>
    </nav>
</header>
<body>
        <center>
            <h3><u>Silahkan isi Form Produk dibawah ini</u></h3>
            <table width="50%">
                <form method="POST" enctype="multipart/form-data">
            	<tr>
            		<td>Kode Unik</td>
            		<td>:</td>
            		<td><input type="text" name="kodeunik" placeholder="Masukkan Kode Unik bebas"></td>
            	</tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td><input style="margin-top: 15px" type="file" name="foto" accept=".jpg, .jpeg, .png"><font size="1"><p class="p-sps2">*Usahakan Rasio foto 1:1</p></font></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" placeholder="Masukkan Nama Produk" required></td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td>:</td>
                    <td><input type="text" name="ukuran" placeholder="Masukkan Ukuran produk. Contoh: 100ml" required></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td><input type="text" name="stok" placeholder="Jumlah Maks. 100" required></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><input type="text" name="harga" placeholder="Masukkan harga barang. Contoh: 15000" required></td>
                </tr>
                <tr class="btn-nav2">
                    <td colspan="3"><input class="hover-button" type="submit" name="simpan" value="SIMPAN"></td>
                </tr>
            </table>
        </center>
    </form>
    <?php
        include '../koneksi.php';
        if(isset($_POST['simpan'])){
            $kodeunik = $_POST['kodeunik'];
            $nama = $_POST['nama'];
            $ukuran = $_POST['ukuran'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];

            //cek file foto
            if(empty($_FILES['foto']['name'])){
                    echo '<script>
                        alert("Foto masih kosong. Mohon unggah file foto.");
                        window.location.href = "input.php";
                         </script>';
                exit;
            }

            //folder simpan gambar
            $dir_file = '../fotoproduk/';

            // Path file
            $photo = $_FILES["foto"]["name"];

            //cek validasi format foto
            $extensifilevalid = ['jpg','jpeg','png'];
            $extensifile = explode('.', $photo);
            $extensifile = strtolower(end($extensifile));
            if (!in_array($extensifile, $extensifilevalid)) {
                echo "<script>
                        alert('Format File $photo Tidak Valid. Gagal Menyimpan...');
                        document.location.href = 'produk-add.php';
                      </script>";
                exit;
            }

            // Generate nama acak untuk file foto
            $acak = uniqid().'.'.$extensifile;

            //memindahkan foto ke local dan cek upload sukses
            if(move_uploaded_file($_FILES["foto"]["tmp_name"],$dir_file . $acak)){
                $insert = mysqli_query($conn, "INSERT INTO produk (kodeunik, nama, ukuran, stok, harga, foto) VALUES
                    ('$kodeunik', '$nama', '$ukuran', '$stok', '$harga', '$acak')");

                if($insert){
                    echo "<script>
                    alert('Data berhasil disimpan!');
                    document.location.href = 'produk.php';
                    </script>";
                } else{
                    echo "<script>
                    alert('Data gagal disimpan: ' . mysqli_error($conn));
                    document.location.href = 'produk-add.php';
                    </script>";
                }
            } else {
            }
        }
    ?>

</body>
</html>