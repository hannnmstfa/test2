<?php
$user = $_POST['username'];
$pass = $_POST['password'];

include 'koneksi.php';
$select = mysqli_query($conn, "SELECT username,password FROM login");
$ambil = mysqli_fetch_array($select);
$v1 = $ambil['username'];
$v2 = $ambil['password'];
// Simulasi validasi, gantilah dengan logika validasi sesungguhnya
if ($user === "$v1" && $pass === "$v2") {
        echo "<script>
        alert('Berhasil Login');
        document.location.href = 'admin/index.php';
        </script>";
} else {
        echo "<script>
        alert('Username dan Password salah...');
        document.location.href = 'login.php';
        </script>";
}
?>