<?php
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $judul_kegiatan = $_POST["judul_kegiatan"]; // Ubah sesuai dengan input judul kegiatan
    // Lakukan penghapusan berdasarkan judul kegiatan
    $query = "DELETE FROM kegiatan WHERE judul = '$judul_kegiatan'";
   
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil dihapus";
        header("Location: /public/index.php"); // Redirect ke halaman utama setelah penghapusan
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
