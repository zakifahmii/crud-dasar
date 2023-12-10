<?php
require_once '../function.php';

// Pastikan $id terdefinisi sebelum digunakan
$id = $_GET['id'] ?? null;

// Periksa apakah ID terdefinisi
if ($id === null) {
    // Handle ketika ID tidak terdefinisi
    echo "ID tidak ditemukan.";
    exit; // Stop eksekusi skrip
}

$query = "SELECT * FROM siswa WHERE id='$id'";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dijalankan
if ($result) {
    // Ambil data dari hasil query
    $data = mysqli_fetch_assoc($result);
} else {
    // Handle jika query gagal dijalankan
    echo "Query gagal dieksekusi: " . mysqli_error($conn);
    exit; // Stop eksekusi skrip
}

if (isset($_POST["submit"])) {
    if (editData($_POST) > 0) {
        echo "<script type='text/javascript'>
        alert('Data Berhasil di Ubah!');
        window.location = '../beranda.php';</script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Data Gagal di Ubah!');
        window.location = 'edit.php?id=$id';</script>"; // Tambahkan ID ke URL edit.php
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Siswa</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Data Siswa</h1>
        <a href="../beranda.php" type="button" class="btn btn-primary">← Kembali</a>
        <div class="box">
            <form method="post" enctype="multipart/form-data">
                <label>Nama Peserta Didik</label>
                <input type="hidden" name="id" class="form-control" value="<?= $data['id']; ?>">
                <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>">

                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $data['alamat']; ?>">

                <label>Jenis Kelamin</label>
                <select id="jk" class="form-select" name="jk">
                    <option value="Laki-Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label>Agama</label>
                <select id="agama" class="form-select" name="agama">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Katolik</option>
                    <option value="Kristen">Protestan</option>
                    <option value="Kristen">Hindu</option>
                    <option value="Kristen">Budha</option>
                    <option value="Kristen">Konghucu</option>
                </select>

                <label>Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control" value="<?= $data['asal_sekolah']; ?>">
                <hr>
                <button type="submit" name="submit" class="btn btn-primary">Edit Produk</button>
            </form>
        </div>
    </div>
</body>

</html>