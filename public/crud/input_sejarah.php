<?php
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $deskripsi = $_POST["deskripsi_sejarah"];
    $gambar = $_FILES["gambar_sejarah"]["name"];
    $gambar_tmp = $_FILES["gambar_sejarah"]["tmp_name"];
    $gambar_path = "public/img_db/" . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Cek apakah data sudah ada di database
    $query_check = "SELECT * FROM sejarah";
    $result = mysqli_query($koneksi, $query_check);

    if (mysqli_num_rows($result) > 0) {
        // Lakukan update jika data sudah ada
        $query = "UPDATE sejarah SET sejarah='$deskripsi', gambar_sejarah='$gambar_path'";
    } else {
        // Lakukan insert jika data belum ada
        $query = "INSERT INTO sejarah (sejarah, gambar_sejarah) VALUES ('$deskripsi', '$gambar_path')";
    }

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil di" . (mysqli_num_rows($result) > 0 ? "update" : "tambahkan");
        header("Location: /public/index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);

?>

