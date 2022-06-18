<?php 
require('function.php');
if(isset($_POST['nama'])){
	define('DB','db.txt');
	if(!file_exists(DB)){
		saveTxt(DB,"2022|nama|pekerjaan|alamat|".PHP_EOL,'a');
	}
	$loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$total = explode("|",$loadDB[count($loadDB)-1]);
	$id = $total[0]+1;
	$nama = $_POST['nama'];
	$pekerjaan = $_POST['pekerjaan'];
	$alamat = $_POST['alamat'];
	$foto = $_FILES['foto']['name'];
	$temp = $_FILES['foto']['tmp_name'];
	if(move_uploaded_file($temp,'foto/'.$foto)){
		saveTxt(DB,"$id|$nama|$pekerjaan|$alamat|$foto".PHP_EOL,'a');
		header('location:index.php');
		exit;
	}
}
?>

<html>
<head>
<title>DB TXT Add</title>
</head>
<body>
<?php require('menu.php');?>
<div align="center" style="border:#000000 solid 0px;">
	<div align="justify" style="width:300px; border:#000000 solid 0px;">
		<form enctype="multipart/form-data" action="#" method="POST">
			<span> Nama </span><br/>
			<input name="nama" type="text"><br/>
			<span> Pekerjaan </span><br/>
			<input name="pekerjaan" type="text"><br/>
			<span> Alamat </span><br/>
			<input name="alamat" type="text"><br/>
			<input name="foto" type="file"><br/>
			<br/>
			<input type="submit" value="Add Data">
		</form>	
	</div>
</div>

</body>
</html>