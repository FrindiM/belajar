<?php
session_start();
$nama = $_SESSION["username"];
include '../config.php';
$limit = 10 * 1024 * 1024;
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$jumlahFile = count($_FILES['foto']['name']);

for ($x = 0; $x < $jumlahFile; $x++) {
    $namafile = $_FILES['foto']['name'][$x];
    $tmp = $_FILES['foto']['tmp_name'][$x];
    $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
    $ukuran = $_FILES['foto']['size'][$x];
    if ($ukuran > $limit) {
        header("location:../index.php?alert=gagal_ukuran&page=user");
    } else {
        if (!in_array($tipe_file, $ekstensi)) {
            header("location:../index.php?alert=gagal_ektensi&page=user");
        } else {
            $dir = '../file/' . $nama;
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            move_uploaded_file($tmp, $dir . '/' . date('d-m-Y') . '-' . $namafile);
            $x = date('d-m-Y') . '-' . $namafile;
            mysqli_query($conn, "INSERT INTO gambar VALUES(NULL, '$x')");
            header("location:../index.php?page=user&alert=simpan");
        }
    }
}
