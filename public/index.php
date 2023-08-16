<?php
    $koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // data visi misi
    $query_visi_misi = "SELECT * FROM visimisi";
    $result_visi_misi = mysqli_query($koneksi, $query_visi_misi);

    $data_visi_misi = array();

    while ($row = mysqli_fetch_assoc($result_visi_misi)) {
        $data_visi_misi[] = $row;
    }

    // data kegiatan
    $query_kegiatan = "SELECT * FROM kegiatan";
    $result_kegiatan = mysqli_query($koneksi, $query_kegiatan);

    $data_kegiatan = array();

    while ($row = mysqli_fetch_assoc($result_kegiatan)) {
        $data_kegiatan[] = $row;
    }

    // data sejarah
    $query_sejarah = "SELECT * FROM sejarah";
    $result_sejarah = mysqli_query($koneksi, $query_sejarah);

    $data_sejarah = array();

    while ($row = mysqli_fetch_assoc($result_sejarah)) {
        $data_sejarah[] = $row;
    }

    // data beranda
    $query_beranda = "SELECT * FROM beranda";
    $result_beranda = mysqli_query($koneksi, $query_beranda);

    $data_beranda = array();

    while ($row = mysqli_fetch_assoc($result_beranda)) {
        $data_beranda[] = $row;
    }

    mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/output.css">
  <title>Kominfo</title>
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
            <a href="/public/login.php" class="px-4 hover:text-blue md:text-blue md:border md:text-sm md:font-semibold xs:text-white bg-white rounded-xl md:uppercase">Admin</a>
            <a href="/public/login.php" class="px-4 md:ms-2 hover:text-blue md:text-blue md:border md:text-sm md:font-semibold xs:text-white bg-white rounded-xl md:uppercase">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- hero section -->
  <section id="hero" class="bg-[url('/public/img/hero-section/bg.png')] bg-cover bg-center z-2">
    <div class="px-4 py-[100px] md:py-[200px] pt-auto sm:flex sm:px-16 md:px-32">
        <div id='tulisan' class="sm:my-auto max-w-[600px]">
            <h3 class="text-lg text-blue font-semibold"><?php echo $data_beranda[0]['sub_judul']; ?></h3>
            <h1 class="text-white text-3xl font-bold"><?php echo $data_beranda[0]['judul']; ?></h1>
            <a id="btn-menu"href="#history" class="bg-blue text-white px-6 py-2 mt-2 mb-4 inline-block cursor-pointer">Tentang Kami</a>
        </div>
    </div>
  </section>

  <!-- fly section -->
  <section id="fly" class="mt-[-40px] z-20">
    <div class="flex justify-between sm:justify-evenly mx-auto items-center shadow-lg w-[80%] max-w-[600px] px-[50px] h-[70px] rounded-md bg-white">
        <div>
            <img src="/public/img/fly-section/goverment.png" alt="" class="w-[25px] mx-auto">
            <p class="text-[11px] font-semibold text-brown text-center">Layanan Perintah</p>
        </div>
        <div>
            <img src="/public/img/fly-section/office-building.png" alt="" class="w-[25px] mx-auto">
            <p class="text-[11px] font-semibold text-brown text-center">Layanan Non Perintah</p>
        </div>
        <div>
            <img src="/public/img/fly-section/sertificate.png" alt="" class="w-[25px] mx-auto">
            <p class="text-[11px] font-semibold text-brown text-center">Sertifikat Komptensi</p>
        </div>
    </div>
  </section>

  <!-- sejarah section -->
  <section id="history">
    <div id="judul" class="text-center pt-[60px]">
      <h3 class="text-md font-semibold">Sejarah Kami</h3>
      <h1 class="text-blue text-2xl font-bold">Berawal dari 1945</h1>
    </div>
    <div class="bg-pink px-4 pt-4 sm:flex md:justify-center sm:px-16 md:px-32">
        <div>
            <img src="/public/img//history-section/gambar-sejarah.jpg" alt="" class="w-[250px] sm:w-[400px] mx-auto md:mx-4">
        </div>
          <div class="sm:my-auto mt-4">
            <?php foreach ($data_sejarah as $sejarah): ?>
                <p class="text-brown md:w-[400px] sm:mx-4"><?php echo $sejarah['sejarah']; ?></p>
            <?php endforeach; ?>
              
          </div>
    </div>
  </section>
  
  <!-- visi & misi -->
  <section id="visi-misi" class="pt-[50px] pb-[30px]">
    <h1 class="text-blue text-2xl font-bold text-center mb-[30px]">VISI & MISI</h1>
    <div class="flex justify-evenly max-w-[1000px] mx-auto flex-wrap">
        <?php foreach ($data_visi_misi as $item): ?>
            <div class="shadow-xl w-[300px] flex flex-row items-center px-2 py-2 my-2 rounded-xl border border-bgGrey">
                <img src="/public/img/fly-section/document.png" alt="" class="w-[40px] my-auto">
                <h3 class="font-semibold ms-2"><?php echo $item['judul']; ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
  </section>

  <!-- kegiatan kami -->
  <section id="kegiatan" class="pt-[50px] pb-[80px]">
    <h1 class="text-blue text-2xl font-bold text-center mb-[30px]">KEGIATAN KAMI</h1>
    <div class="flex justify-evenly md:justify-center max-w-[1200px] mx-auto flex-wrap">
        <?php foreach ($data_kegiatan as $kegiatan): ?>
            <div class="shadow-xl w-[250px] flex flex-col mx-[10px] py-2 my-2">
                <img src="<?php echo $kegiatan['link_gambar']; ?>" alt="" class="w-full">
                <h3 class="font-semibold px-2 my-2"><?php echo $kegiatan['judul']; ?></h3>
                <a href="/public/kegiatan.php?id=<?php echo $kegiatan['id']; ?>" class="px-2 text-blue mt-auto">Selengkapnya→</a>  
            </div>
        <?php endforeach; ?>
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