<?php
include 'header.php';
require('function.php');

if (!empty($_GET['id'])) {
	$loadEdit = edit($_GET['id']);
	$explEdit = explode('#', $loadEdit);
	$Kategori = $explEdit[1];
	$Nama = $explEdit[2];
	$Harga = $explEdit[3];
	$foto = $explEdit[4];
}
if (isset($_POST['submit'])) {
	define('DB', 'produk.txt');
	if (!file_exists(DB)) {
		saveTxt(DB, "Id#Kategori#Nama#Harga#Foto" . PHP_EOL, 'a');
	}
	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$Kategori = $_POST['kategori'];
	$harga = 'Rp' . $_POST['harga'];
	$namafoto = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	$dataLast = edit($_GET['id']);
	if (move_uploaded_file($temp, 'image/' . $namafoto)) {
		$content = str_replace($dataLast, "$id#$Kategori#$nama#$harga#$namafoto", file_get_contents(DB));
		unlink('image/' . $foto);
		saveTxt(DB, $content, 'w');
	} else {
		$content = str_replace($dataLast, "$id#$Kategori#$nama#$harga#$foto", file_get_contents(DB));
		saveTxt(DB, $content, 'w');
	}

	header('location:index.php');
	exit;
}

function edit($id)
{
	$db = 'produk.txt';
	$loadDB = @file($db, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	foreach ($loadDB as $data) {
		$exp = explode('#', $data);
		$myid = $exp[0];
		if ($myid == $id) {
			$out = $data;
			break;
		} else {
			$out = null;
		}
	}
	return $out;
}
?>
<div class="container mt-3">
    <div class="card" style="background-color:#0dcaf0 ;">
        <div class="card-body">
            <h3 class="card-title">Insert data</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <strong class="form-label">Nama Barang :</stro>
                        <input type="text" class="form-control" name="nama" placeholder="masukan nama barang"
                            value="<?php echo $Nama; ?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Kategori :</label>
                    <select class="form-select" name="kategori">
                        <option value="keyboard" <?php if ($Kategori == 'keyboard') {
														echo 'selected';
													} ?>>keyboard</option>
                        <option value="mouse" <?php if ($Kategori == 'mouse') {
													echo 'selected';
												} ?>>mouse</option>
                        <option value="monitor" <?php if ($Kategori == 'monitor') {
													echo 'selected';
												} ?>>monitor</option>
                        <option value="cpu" <?php if ($Kategori == 'cpu') {
												echo 'selected';
											} ?>>cpu</option>
                        <option value="gpu" <?php if ($Kategori == 'gpu') {
												echo 'selected';
											} ?>>gpu</option>
                        <option value="motherboard" <?php if ($Kategori == 'motherboard') {
														echo 'selected';
													} ?>>motherboard</option>
                        <option value="cooling" <?php if ($Kategori == 'cooling') {
													echo 'selected';
												} ?>>cooling</option>
                        <option value="casing" <?php if ($Kategori == 'casing') {
													echo 'selected';
												} ?>>casing</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Barang :</label>
                    <input type="text" class="form-control" name="harga" placeholder="masukan harga barang"
                        value="<?php echo $Harga; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Barang :</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <div class="mb-3">
                    <img src="image/<?php echo $foto; ?>" width="200px"></img>
                </div>
                <div class="float-end">
                    <button class="btn btn-success" type="submit" name="submit">
                        <i class="bi bi-check2-square"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>