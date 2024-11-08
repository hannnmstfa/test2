<?php
	include '../koneksi.php';
	$sql = "SELECT foto FROM produk WHERE kodeunik = '".$_GET['kodeunik']."'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        //mengambil nama file foto
        $namaFile = $row['foto'];

        //lokasi penyimpanan file foto
        $lokasi = "../fotoproduk/" . $namaFile;

        //hapus data dari database
       if(isset($_GET['kodeunik'])){
        $delete = mysqli_query($conn, "DELETE FROM produk WHERE kodeunik = '".$_GET['kodeunik']."'");
        }

        //mengambil nama dari database
        $kode = $_GET['kodeunik'];

		// Hapus file jika ada
        if (file_exists($lokasi)) {
            if (unlink($lokasi)) {
                echo "<script>
                     alert('Data dari kode $kode berhasil dihapus...');
                     document.location.href = 'produk.php';
                      </script>";
            } else {
                echo "<script>
                alert('Gagal menghapus file foto dari kode $kode...');
                document.location.href = 'produk.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('File foto kode $kode tidak ditemukan...');
            document.location.href = 'produk.php';
            </script>";
        }
    }
} else {
    echo "<script>
    alert('Tidak ada file yang perlu dihapus...');
    document.location.href = 'produk.php';
    </script>";
    
}
?>