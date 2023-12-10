<?php
require '../function.php';

$id = $_GET['id'];

if (hapusData($id) > 0) {
    echo "
        <script type='text/javascript'>
        alert('Data Gagal di Hapus!')
        window.location= '../beranda.php'
        </script>
        ";
} else {
    echo "
        <script type='text/javascript'>
        alert('Data Berhasil di Hapus!')
        window.location= '../beranda.php'
        </script>
        ";
}
