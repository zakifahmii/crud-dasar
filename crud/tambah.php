<?php
require_once '../function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $jk = $_POST["jk"];
    $agama = $_POST["agama"];
    $asal_sekolah = $_POST["asal_sekolah"];

    $query = "INSERT INTO siswa (nama, alamat, jk, agama, asal_sekolah) 
    VALUES ('$nama', '$alamat', '$jk', '$agama', '$asal_sekolah')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../beranda.php");
        exit();
    } else {
        echo "Gagal menambahkan data.";
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
    <title>Tambah Siswa</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Siswa</h1>
        <a href="../beranda.php" type="button" class="btn btn-primary">← Kembali</a>
        <div class="box">
            <form method="post" enctype="multipart/form-data">
                <label>Nama Siswa</label>
                <input type="text" name="nama" class="form-control">

                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">

                <label for="jk">Jenis Kelamin</label><br>
                <select id="jk" class="form-select" name="jk">
                    <option value="Laki-Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label for="agama">Agama</label><br>
                <select id="agama" class="form-select" name="agama">
                    <option value="Islam">Islam</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>

                <label>Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control"></input>

                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
            </form>
        </div>
    </div>
</body>

</html>