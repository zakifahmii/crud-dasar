<?php
include 'function.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    echo "<script>
           alert('Anda belum login, silahkan login dulu!');
           window.location = 'index.php';
           </script>";
    exit;
}

$sqlGet = "SELECT * FROM siswa";
$query = mysqli_query($conn, $sqlGet);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Beranda</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Selamat Datang <?= $_SESSION["username"]; ?><a href="auth/logout.php" type="button" class="btn btn-danger" style="margin-left: 16.5cm;">Keluar</a>
        </h1>

        <br>
        <h4>Daftar Siswa</h4>
        <a href="crud/tambah.php" type="button" class="btn btn-primary">+ Tambah Data</a>
        <table class="table table-striped table-hover table-bordered mt-5">
            <thead class="table-dark">
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Aksi</th>
            </thead>
            <?php
            // Loop untuk menampilkan data siswa
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?= $data["id"] ?></td>
                    <td><?= $data["nama"]; ?></td>
                    <td><?= $data["alamat"]; ?></td>
                    <td><?= $data["jk"]; ?></td>
                    <td><?= $data["agama"]; ?></td>
                    <td><?= $data["asal_sekolah"]; ?></td>
                    <td>
                        <a class="btn btn-warning" href="crud/edit.php?id=<?= $data["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin edit data ini?')" class="edit">Edit</a>

                        <a class="btn btn-danger" href="crud/hapus.php?id=<?= $data["id"]; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')" class="hapus">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>