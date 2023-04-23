<?php
session_start();
echo "Selamat Datang: " . $_SESSION["username"];

?>

<div class="container">
    <h2 style="text-align: center;">UPLOAD MULTI FILE PHP</h2>
    <?php
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "gagal_ukuran") {
    ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> Ukuran File Terlalu Besar
            </div>
        <?php
        } elseif ($_GET['alert'] == "gagal_ektensi") {
        ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> Ekstensi Gambar Tidak Diperbolehkan
            </div>
        <?php
        } elseif ($_GET['alert'] == "simpan") {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> Gambar Berhasil Disimpan
            </div>
    <?php
        }
    }
    ?>
    <form action="code/simpan_gambar.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Foto :</label>
            <input type="file" name="foto[]" required="required" multiple />
            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
        </div>
        <input type="submit" name="" value="Simpan" class="btn btn-primary">
        <a href="index.php?page=tampil_user" class="btn btn-primary">Gambar</a>
    </form>
</div>