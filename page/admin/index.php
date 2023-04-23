<?php
include 'config.php';
$query = mysqli_query($conn, "SELECT * FROM gambar");
$tt = "Admin";
?>
<div class="container">
    <div class="row">
        <?php while ($data = mysqli_fetch_array($query)) : ?>
            <?php
            $nama_file = $data['gambar_nama'];
            $path = 'file/*/'; // Cari file pada semua folder
            $pattern = $path . $nama_file;
            $files = glob($pattern);
            ?>
            <?php foreach ($files as $file) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?php echo $file; ?>" class="card-img-top" alt="<?php echo $nama_file; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $nama_file; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endwhile; ?>
    </div>
</div>