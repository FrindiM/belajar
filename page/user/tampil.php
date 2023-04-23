<?php
session_start();
$nama = $_SESSION["username"];
include 'config.php';

// Jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT * FROM gambar WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
    $gambar_nama = $data['gambar_nama'];
    $file_path = "file/" . $nama . "/" . $gambar_nama;
    unlink($file_path); // hapus file dari folder
    mysqli_query($conn, "DELETE FROM gambar WHERE id = '$id'"); // hapus data dari database
    header("location:index.php?page=tampil_user");
}

$query = mysqli_query($conn, "SELECT * FROM gambar");
?>
<div class="container">
    <div class="row mt-5">
        <?php while ($data = mysqli_fetch_array($query)) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="file/<?php echo $nama ?>/<?php echo $data['gambar_nama']; ?>" class="card-img-top" alt="<?php echo $data['gambar_nama']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['gambar_nama']; ?></h5>
                        <a href="file/<?php echo $nama ?>/<?php echo $data['gambar_nama']; ?>" target="_blank" class="btn btn-primary mb-2">Lihat Full</a>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                            <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>