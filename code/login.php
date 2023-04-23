<?php
session_start(); // Memulai session

include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai input dari form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Melakukan query untuk mencari user dengan username dan password yang sesuai
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Jika ditemukan user dengan username dan password yang sesuai
    if (mysqli_num_rows($result) == 1) {
        // Mengambil data user dari database
        $row = mysqli_fetch_assoc($result);

        // Menyimpan data user ke session
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"] = $row["role"];

        // Mengecek role user
        if ($row["role"] == "admin") {
            // Jika user merupakan admin, redirect ke halaman admin.php
            header("Location: ../index.php?page=admin");
            exit();
        } else if ($row["role"] == "user") {
            // Jika user merupakan user, redirect ke halaman user.php
            header("Location: ../index.php?page=user");
            exit();
        }
    } else {
        // Jika tidak ditemukan user dengan username dan password yang sesuai, tampilkan pesan error
        $error = "Username atau password salah.";
    }

    // Menutup koneksi ke database
    mysqli_close($conn);
}
