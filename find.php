<?php 
require('function.php');
define('DB','db.txt');
?>

<html>
<head>
<title>DB TXT</title>
</head>
<body>

<?php require('menu.php');?>

<div align="center">
		<form action="#" method="POST">
			<input name="nama" type="text" value="Masukan Nama">
			<input type="submit" value="Find">
		</form>	
<table border="1">
<tr>
<td>Options</td>
<td>Nama</td>
<td>Pekerjaan</td>
<td>Alamat</td>
</tr>
<?php 
if(isset($_POST['nama'])){
	$loadDB = @file(DB, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	$in = $_POST['nama'];
	$x = 0;
	foreach ($loadDB as $data){
		$expl = explode('|',$data);
		$dbNama = $expl[1];
		$inpre = "/^.*$in.*\$/m";
		if($x==true){
			if(preg_match_all($inpre,$dbNama,$xx)){
				$outExp = explode('|',$data);
				$Id = $outExp[0];
				$Nama = $outExp[1];
				$Pekerjaan = $outExp[2];
				$Alamat = $outExp[3];
			


?>
<tr>
<td><a href="dell.php?id=<?=$Id;?>">Dell</a> | <a href="edit.php?id=<?=$Id;?>">Edit</a></td>
<td><?=$Nama;?></td>
<td><?=$Pekerjaan;?></td>
<td><?=$Alamat;?></td>
</tr>

		<?php	}
		}	
		$x++;
	}
	
}


?>

</table>
</div>


</body>
</html>