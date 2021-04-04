<?php
require 'functions.php';

//Ambil data di url
$id_customer = $_GET["id_customer"];

// query data Obat berdasarkan id_customer
$obat = query("SELECT * FROM dataobat WHERE id_customer = $id_customer")[0];
//var_dump($obat[0]["Ko de"]);

//cek apakah tombol submit sudah ditekan atau belom
if( isset($_POST["submit"])){



		// Cek apakah data berhasil ditambahkan atau tidak
	if(ubah($_POST) > 0 ){
		echo "
			<script>
				alert('data berhasil diubah !');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "
			<script>
				alert('data gagal diubah !');
				document.location.href = 'index.php';
			</script>";
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Ubah Data Obat</title>
</head>
<body>
	<h1>Ubah Data Obat</h1>

	<form action="" method="post">
		<input type="hidden" name="id_customer" value="<?= $obat["id_customer"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $obat["nama"]; ?>">
			</li>
		
			<li>
				<label for="Deskripsi">Deskripsi : </label>
				<input type="text" name="Deskripsi" id="Deskripsi" value="<?= $obat["Deskripsi"]; ?>">
			</li>
			<li>
				<label for="Tipe">Tipe : </label>
				<input type="text" name="Tipe" id="Tipe" value="<?= $obat["Tipe"]; ?>">
			</li>
			<li>
				<label for="Jumlah">Jumlah : </label>
				<input type="text" name="Jumlah" id="Jumlah" value="<?= $obat["Jumlah"]; ?>"> 
			</li>
			<li>
				<label for="Gambar">Gambar : </label>
				<input type="text" name="Gambar" id="Gambar" value="<?= $obat["Gambar"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit"> Ubah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>