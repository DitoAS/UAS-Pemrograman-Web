<?php
include 'header.php';
require('function.php');
if (isset($_POST['submit'])) {
    define('DB', 'produk.txt');
    if (!file_exists(DB)) {
        saveTxt(DB, "Id#Kategori#Nama#Harga#Foto" . PHP_EOL, 'a');
    }
    $loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $total = explode("#", $loadDB[count($loadDB) - 1]);
    $id = $total[0] + 1;
    $nama = $_POST['nama'];
    $Kategori = $_POST['kategori'];
    $Harga = 'Rp' . $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $temp = $_FILES['foto']['tmp_name'];
    if (move_uploaded_file($temp, 'image/' . $foto)) {
        saveTxt(DB, "$id#$Kategori#$nama#$Harga#$foto" . PHP_EOL, 'a');
        header('location:index.php');
        exit;
    }
}
?>
<div class="container mt-3">
    <div class="card" style="background-color:#0dcaf0 ;">
        <div class="card-body">
            <h3 class="card-title">Insert data</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <strong class="form-label">Nama Barang :</stro>
                        <input type="text" class="form-control" name="nama" placeholder="masukan nama barang" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Kategori :</label>
                    <select class="form-select" name="kategori" required>
                        <option selected>Kaegori barang</option>
                        <option value="keyboard">keyboard</option>
                        <option value="mouse">mouse</option>
                        <option value="monitor">monitor</option>
                        <option value="cpu">cpu</option>
                        <option value="gpu">gpu</option>
                        <option value="motherboard">motherboard</option>
                        <option value="cooling">cooling</option>
                        <option value="casing">casing</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Barang :</label>
                    <input type="number" class="form-control" name="harga" placeholder="masukan harga barang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Barang :</label>
                    <input type="file" class="form-control" name="foto" required>
                </div>
                <div class="float-end">
                    <button class="btn btn-success" type="submit" name="submit"><i
                            class="bi bi-check2-square"></i></button>
                    <button class="btn btn-danger" type="reset"><i class="bi bi-x-square"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>