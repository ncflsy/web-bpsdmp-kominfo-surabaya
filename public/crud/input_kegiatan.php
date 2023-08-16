<?php
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $kegiatan = mysqli_real_escape_string($koneksi, $_POST["judul_kegiatan"]);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST["deskripsi"]);
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_path = "/public/img_db/" . basename($gambar); 
    if (move_uploaded_file($gambar_tmp, $_SERVER["DOCUMENT_ROOT"] . $gambar_path)) {
        $query = "INSERT INTO kegiatan (judul, deskripsi, link_gambar) VALUES ('$kegiatan', '$deskripsi', '$gambar_path')";

        if (mysqli_query($koneksi, $query)) {
            echo "Data berhasil ditambahkan";
            header("Location: /public/index.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
}

mysqli_close($koneksi);
?>


