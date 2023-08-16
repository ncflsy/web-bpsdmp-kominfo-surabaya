<?php
$koneksi = mysqli_connect("localhost", "root", "", "118_nicoflassy");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $visi_misi_1 = $_POST["visi_misi_1"];
    $visi_misi_2 = $_POST["visi_misi_2"];
    $visi_misi_3 = $_POST["visi_misi_3"];
    $visi_misi_4 = $_POST["visi_misi_4"];
    $visi_misi_5 = $_POST["visi_misi_5"];
    $visi_misi_6 = $_POST["visi_misi_6"];

    // Inisialisasi array untuk mengumpulkan data yang memiliki nilai
    $dataToInsert = [];

    // Periksa nilai input dan tambahkan ke array jika tidak kosong
    if (!empty($visi_misi_1)) {
        $dataToInsert[] = $visi_misi_1;
    }
    if (!empty($visi_misi_2)) {
        $dataToInsert[] = $visi_misi_2;
    }
    if (!empty($visi_misi_3)) {
        $dataToInsert[] = $visi_misi_3;
    }
    if (!empty($visi_misi_4)) {
        $dataToInsert[] = $visi_misi_4;
    }
    if (!empty($visi_misi_5)) {
        $dataToInsert[] = $visi_misi_5;
    }
    if (!empty($visi_misi_6)) {
        $dataToInsert[] = $visi_misi_6;
    }

    if (!empty($dataToInsert)) {
        // Cek apakah data dengan nilai yang sama sudah ada di tabel
        $query_check = "SELECT * FROM visimisi";
        $result = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result) > 0) {
            // Lakukan update jika data sudah ada dengan nilai yang sama
            foreach ($dataToInsert as $index => $value) {
                $query = "UPDATE visimisi SET judul='$value' WHERE id=" . ($index + 1);
                if (!mysqli_query($koneksi, $query)) {
                    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
                }
            }
            echo "Data berhasil diupdate";
        } else {
            // Lakukan insert jika data belum ada
            $values = implode("'), ('", $dataToInsert);
            $query = "INSERT INTO `visimisi`(`judul`) VALUES ('$values')";
            if (!mysqli_query($koneksi, $query)) {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            } else {
                echo "Data berhasil ditambahkan";
            }
        }

        header("Location: /public/index.php");
    } else {
        echo "Tidak ada data yang memiliki nilai untuk diinput";
    }
}

mysqli_close($koneksi);
?>
