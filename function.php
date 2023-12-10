<?php

session_start();
require 'koneksi.php';

function query($query)
{
    global $conn;
    $rows = [];
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahData($data)
{
    global $conn;
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $jk = $data["jk"];
    $agama = $data["agama"];
    $asal_sekolah = $data["asal_sekolah"];

    $query = "INSERT INTO produk VALUES(NULL, '$nama','$alamat','$jk','$agama','$asal_sekolah')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusData($id)
{
    global $conn;
    if (isset($_GET['id'])) {
        // perintah query untuk menghapus data pada tabel is_siswa
        $query = mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");
    }
}

function editData($data)
{
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $jk = $data["jk"];
    $agama = $data["agama"];
    $asal_sekolah = $data["asal_sekolah"];

    if (empty($foto_produk)) {
        $query = "UPDATE siswa SET
        nama = '$nama',
        alamat = '$alamat',
        jk = '$jk',
        agama = '$agama',
        asal_sekolah = '$asal_sekolah' WHERE id = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } else {
        $query = "UPDATE siswa SET
        nama = '$nama',
        alamat = '$alamat',
        jk = '$jk',
        agama = '$agama',
        asal_sekolah = '$asal_sekolah' WHERE id = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}