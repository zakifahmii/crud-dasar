<?php

include '../koneksi.php';

$username = $_POST['username'];
$pw = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password ='$pw'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("Location: ../beranda.php");
} else {
    echo "
    <script type='text/javascript'>
    alert('Mohon maaf, username atau password salah')
    window.location = '../index.php';
    </script>
    ";
}
