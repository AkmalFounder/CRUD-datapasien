<?php
require 'functions.php';


//cek apakah tombol submit sudah ditekan atau belom
if( isset($_POST["submit"])){


	// ambil data dari tiap elemen dalam form
	// $nama = $_POST["nama"];
	// $Deskripsi = $_POST["Deskripsi"];
	// $Tipe = $_POST["Tipe"];
	// $Jumlah = $_POST["Jumlah"];
	// $Gambar = $_POST["Gambar"];

	//query insert data
	// $query = "INSERT INTO dataobat VALUES ('', '$nama','$Deskripsi','$Tipe','$Jumlah','$Gambar')";
	// mysqli_query($conn, $query);


	// if(mysqli_affected_rows($conn) > 0){
	// 	echo "berhasil";
	// }else{
	// 	echo "gagal!";
	// 	echo "<br>";
	// 	echo mysqli_error($conn);
	//}

		// Cek apakah data berhasil ditambahkan atau tidak
	if(tambah($_POST) > 0 ){
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>";
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Obat</title>
</head>
<body>
	<h1>Tambah Data Obat</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama">
			</li>
		
			<li>
				<label for="Deskripsi">Deskripsi : </label>
				<input type="text" name="Deskripsi" id="Deskripsi">
			</li>
			<li>
				<label for="Tipe">Tipe : </label>
				<input type="text" name="Tipe" id="Tipe">
			</li>

			<li>
				<label for="Gambar">Gambar : </label>
				<input type="file" name="Gambar" id="Gambar"> 
			</li>
			<li>
				<button type="submit" name="submit"> Tambah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>