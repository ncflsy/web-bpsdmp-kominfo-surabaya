<?php
// Koneksi ke database (ganti dengan informasi koneksi yang sesuai)
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencocokkan username dan password dalam database
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Data berhasil ditambahkan";
    header("Location: /public/input.php");
} else {
    // Jika data tidak ditemukan, artinya login gagal
    echo "<script>
            alert('Masukkan password dengan benar');
            window.location = '/public/login.php';
          </script>";
}

mysqli_close($koneksi);
?>
