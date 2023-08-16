<?php
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $judul = $_POST["judul"];
    $sub_judul = $_POST["sub_judul"];

    // Cek apakah data dengan judul yang sama sudah ada di tabel
    $query_check = "SELECT * FROM beranda WHERE judul = '$judul'";
    $result = mysqli_query($koneksi, $query_check);

    if (mysqli_num_rows($result) > 0) {
        // Lakukan update jika data sudah ada dengan judul yang sama
        $query = "UPDATE beranda SET sub_judul = '$sub_judul' WHERE judul = '$judul'";
    } else {
        // Lakukan insert jika data belum ada
        $query = "INSERT INTO beranda (judul, sub_judul) VALUES ('$judul', '$sub_judul')";
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
