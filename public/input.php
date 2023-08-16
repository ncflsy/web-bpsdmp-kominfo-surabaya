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
    <title>input</title>
</head>
<body>
    <div class="flex justify-center pt-8 bg-bgGrey">
        <div class="container shadow-xl w-[80%] flex pt-4 flex-col bg-whiteOri h-[2000px]">
            <div class="w-[80%] mx-auto bg-blue text-white ">
                <h1 class="text-xl font-bold text-center my-2">HALAMAN ADMIN</h1>
            </div>
            <!-- hero section -->
            <div id="input-hero-section" class="pb-16">
                <h1 class="text-md font-bold text-center my-2 text-darkGrey">BERANDA</h1>
                <hr class="w-[70%] h-[1px] bg-lightGrey mx-auto">
                <form action="/public/crud/input_beranda.php" method="post" enctype="multipart/form-data">
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">JUDUL</p>
                        <input type="text" placeholder="Masukan email" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="judul" value="<?php echo $data_beranda[0]['judul']; ?>">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">SUB JUDUL</p>
                        <input type="text" placeholder="Masukan email" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="sub_judul" value="<?php echo $data_beranda[0]['sub_judul']; ?>">
                    </div>
                    <button class="px-4 w-[100px] h-[35px] bg-blue text-white rounded-lg flex justify-center items-center font-bold mx-auto" type="submit" name="submit">SIMPAN</button>
                </form>
                    
            </div>
            <!-- sejarah section -->
            <div id="input-history-section" class="pb-16">
                <h1 class="text-md font-bold text-center my-2 text-darkGrey">SEJARAH</h1>
                <hr class="w-[70%] h-[1px] bg-lightGrey mx-auto">
                <form action="/public/crud/input_sejarah.php" method="post" enctype="multipart/form-data">
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">GAMBAR</p>
                        <input type="file" placeholder="Masukan email" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="gambar_sejarah">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">SEJARAH</p>
                        <textarea placeholder="Masukan email" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey h-[200px]" name="deskripsi_sejarah"><?php echo $data_sejarah[0]['sejarah']; ?></textarea>
                    </div>
                    <button class="px-4 w-[100px] h-[35px] bg-blue text-white rounded-lg flex justify-center items-center font-bold mx-auto" type="submit" name="submit">SIMPAN</button>
                </form>
            </div>
            <!-- visi misi section -->
            <div id="input-visi-misi-section" class="pb-16">
                <h1 class="text-md font-bold text-center my-2 text-darkGrey">VISI & MISI</h1>
                <hr class="w-[70%] h-[1px] bg-lightGrey mx-auto">
                <form action="/public/crud/input_visimisi.php" method="post" enctype="multipart/form-data">
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">VISI MISI 1</p>
                        <input type="text" placeholder="Masukan visi misi" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="visi_misi_1" 
                        value="<?php echo isset($data_visi_misi[0]['judul']) ? $data_visi_misi[0]['judul'] : ''; ?>">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">VISI MISI 2</p>
                        <input type="text" placeholder="Masukan visi misi" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="visi_misi_2" 
                        value="<?php echo isset($data_visi_misi[0]['judul']) ? $data_visi_misi[1]['judul'] : ''; ?>">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">VISI MISI 3</p>
                        <input type="text" placeholder="Masukan visi misi" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="visi_misi_3"
                        value="<?php echo isset($data_visi_misi[0]['judul']) ? $data_visi_misi[2]['judul'] : ''; ?>">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">VISI MISI 4</p>
                        <input type="text" placeholder="Masukan visi misi" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="visi_misi_4"
                        value="<?php echo isset($data_visi_misi[0]['judul']) ? $data_visi_misi[3]['judul'] : ''; ?>">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">VISI MISI 5</p>
                        <input type="text" placeholder="Masukan visi misi" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="visi_misi_5"
                        value="<?php echo isset($data_visi_misi[0]['judul']) ? $data_visi_misi[4]['judul'] : ''; ?>">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">VISI MISI 6</p>
                        <input type="text" placeholder="Masukan visi misi" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey" name="visi_misi_6"
                        value="<?php echo isset($data_visi_misi[0]['judul']) ? $data_visi_misi[5]['judul'] : ''; ?>">
                    </div>
                    <button class="px-4 w-[100px] h-[35px] bg-blue text-white rounded-lg flex justify-center items-center font-bold mx-auto" type="submit" name="submit">SIMPAN</button>
                </form>
            </div>
            <!-- kegiatan section -->
            <div id="input-history-section" class="pb-16">
                <h1 class="text-md font-bold text-center my-2 text-darkGrey">KEGIATAN</h1>
                <hr class="w-[70%] h-[1px] bg-lightGrey mx-auto">
                <!-- fotooo -->
                <div id="target" class="flex justify-evenly md:justify-center max-w-[1200px] mx-auto flex-wrap">
                    <?php foreach ($data_kegiatan as $kegiatan): ?>
                        <div class="kegiatan-item shadow-xl w-[200px] flex flex-col mx-[10px] py-2 my-2"
                            data-judul="<?php echo $kegiatan['judul']; ?>"
                            data-deskripsi="<?php echo $kegiatan['deskripsi']; ?>"
                            data-gambar="<?php echo $kegiatan['link_gambar']; ?>">
                            <img src="<?php echo $kegiatan['link_gambar']; ?>" alt="" class="w-full my-auto">
                            <h3 class="font-semibold px-2 my-2"><?php echo $kegiatan['judul']; ?></h3>
                            <a class="px-2 text-blue text-center cursor-pointer delete-button">Pilih</a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <form id="input-form" action="/public/crud/input_kegiatan.php" method="post" enctype="multipart/form-data">
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">GAMBAR</p>
                        <input type="file" name="gambar" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">KEGIATAN</p>
                        <input id="judul-kegiatan" type="text" placeholder="Masukan judul kegiatan" name="judul_kegiatan" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey">
                    </div>
                    <div class="w-[80%] mx-auto my-2 flex flex-row justify-evenly">
                        <p class="font-semibold text-darkGrey my-auto mx-2">DESKRIPSI</p>
                        <textarea id="deskripsi-kegiatan" name="deskripsi" placeholder="Masukan kegiatan" class="w-[70%] p-2 outline-none ps-2 mx-2 bg-bgGrey border border-lightGrey h-[200px]"></textarea>
                    </div>
                    <button type="submit" class="px-4 w-[100px] h-[35px] bg-blue text-white rounded-lg flex justify-center items-center font-bold mx-auto" name="submit">SIMPAN</button> 
                    <button type="submit" class="px-4 mt-2 w-[100px] h-[35px] bg-red text-white rounded-lg flex justify-center items-center font-bold mx-auto" name="delete" formaction="/public/crud/hapus_kegiatan.php">HAPUS</button>  
                </form>     
            </div>

            <script>
                const kegiatanItems = document.querySelectorAll('.kegiatan-item');

                kegiatanItems.forEach(item => {
                    item.addEventListener('click', () => {
                        const judul = item.getAttribute('data-judul');
                        const deskripsi = item.getAttribute('data-deskripsi');
                        
                        document.getElementById('judul-kegiatan').value = judul;
                        document.getElementById('deskripsi-kegiatan').value = deskripsi;
                    });
                });
            </script>

            <a href="/public/index.php" class="px-4 w-[200px] h-[35px] bg-blue text-white rounded-lg flex justify-center items-center font-bold mx-auto">MASUK KE HOME</a>
        </div>
    </div>
</body>
</html>