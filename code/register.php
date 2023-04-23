<?php
//koneksi ke database
include '../config.php';

//cek jika form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //mendapatkan nilai dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = "user"; //set role default
    // echo $username;
    // echo $password;
    //hash password menggunakan algoritma bcryp

    //query untuk menambahkan user baru
    $sql = "INSERT INTO user (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        //jika user berhasil ditambahkan, redirect ke halaman login
        header("Location: ../index.php?status=berhasil_register");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
