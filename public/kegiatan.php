<?php
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id_kegiatan = $_GET['id'];

    $query_kegiatan = "SELECT * FROM kegiatan WHERE id = $id_kegiatan";
    $result_kegiatan = mysqli_query($koneksi, $query_kegiatan);

    if ($result_kegiatan) {
        $kegiatan_terpilih = mysqli_fetch_assoc($result_kegiatan);
    } else {
        echo "Gagal mengambil data kegiatan.";
    }
} else {
    echo "ID kegiatan tidak ditemukan.";
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/output.css">
  <title>Berita</title>
</head>
<body class="bg-white">
<header class="w-full top-0 left-0 z-99 bg-blue">
    <div class="h-12 container flex items-center  justify-between px-[20px] md:px-[130px]">
      <div class="flex px-2">
        <img src="/public/img/kominfo.png" alt="" class="w-[30px]">
      </div>
      <div id="nav-button" class="md:hidden">
        <span class="nav-line transition duration-300 ease-in-out"></span>
        <span class="nav-line transition duration-300 ease-in-out"></span>
        <span class="nav-line transition duration-300 ease-in-out"></span>
      </div>
      <nav class="hidden md:flex items-center absolute text-black md:text-white bg-white md:bg-transparent shadow-lg md:shadow-none rounded-lg max-w[250px] px-2 py-4 right-4 top-8 md:right-2 md:top-0 md:py-0 md:h-12 h-[200px]">
        <ul>
          <li class="flex flex-col md:flex-row my-auto">
            <a href="#hero" class="px-4 hover:text-blue md:hover:text-black">Beranda</a>
            <a href="#history" class="px-4 hover:text-blue md:hover:text-black">Sejarah</a>
            <a href="#visi-misi" class="px-4 hover:text-blue md:hover:text-black">Visi & Misi</a>
            <a href="#kegiatan" class="px-4 hover:text-blue md:hover:text-black">Kegiatan Kami</a>
            <a href="/public/input.php" class="px-4 hover:text-blue md:text-blue md:border md:text-sm md:font-semibold xs:text-white bg-white rounded-xl md:uppercase">Admin</a>
            <a href="/public/login.php" class="px-4 md:ms-2 hover:text-blue md:text-blue md:border md:text-sm md:font-semibold xs:text-white bg-white rounded-xl md:uppercase">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <section>
    <div class="flex justify-center pt-8 bg-bgGrey">
        <div class="container shadow-xl w-[80%] flex flex-col bg-whiteOri px-[200px] pt-[50px] pb-[300px]">
            <div class="mb-8">
                <a href="/public/index.php" class="cursor-pointer">🏠 HOME</a>
                <span> / </span>
                <a class="cursor-pointer">🖥️ KEGIATAN</a>
            </div>
            <h1 class="text-black text-xl font-bold"><?php echo $kegiatan_terpilih['judul']; ?></h1>
            <img src="<?php echo $kegiatan_terpilih['link_gambar']; ?>" alt="" class="w-[80%] mt-[40px] mb-[30px] mx-auto">
            <h3 class="text-md text-darkGrey"><?php echo $kegiatan_terpilih['deskripsi']; ?></h3>
        </div>
    </div>
</section>

   <!-- footer -->
   <footer class="bg-black text-white text-sm h-[100px] flex flex-col items-center">
    <div class="my-auto">
      <img src="" alt="">
      <div class="flex justify-evenly w-[300px] mx-auto">
        <p>Home</p>
        <p>About</p>
        <p>Visi & Misi</p>
        <p>Kegiatan</p>
      </div>
      </div>
      <p class="text-center">@ 2023 All right. Kominfo 2023</p>
      </div>
    <div>
  </footer>
  <script src="/public/script.js"></script>
</body>
</html>