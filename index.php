<?php
require 'functions.php';
$dataobat = query("SELECT * FROM dataobat");
 
// Tombol cari ditekan
if (isset($_POST["cari"])) {
	$dataobat = cari($_POST["keyword"]);
}




//koneksi ke databse
//$conn = mysqli_connect("localhost", "root", "","phpdasar");

// ambil data dari tabel dataobat / query dataobat
//$result = mysqli_query($conn, "SELECT * FROM dataobat");

//untuk menampilkan eror
//if(!$result){
//	echo mysqli_error($conn);
//}
// while($obat = mysqli_fetch_assoc($result)){
// var_dump($obat);
// }
//while($mhs = mysqli_fetch_assoc($result)){
//echo $result;

//fetch (ambil data) dataobat dari object result
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_array() // mengembalikan keduanya 
// mysqli_fetch_object() // mengembaliksan object
?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Database obat</title>
 </head>
 <body>
 
 <h1>Data Obat</h1>

<a href="tambah.php">Tambah data Pasien</a>
<br><br>

<form action="" method="post" >

	<input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
	<button type="submit" name="cari">Cari!</button>

</form></br>

 <table border="1" cellpadding="10" cellspacing="0">

 	<tr>
 		<th>id_customer. </th>
 		<th>Ubah</th>
 		<th>Hapus</th>
 		<th>Nama </th>
 		<th>deskripsi </th>
 		<th>Tipe </th>
 		<th>Gambar </th>
 	</tr>

<?php $i =1; ?>
<?php foreach( $dataobat as $row): ?>
 	<tr>
 		<td><?= "T00",$i; ?></td>
 		<td>
 			<a href="ubah.php?id_customer=<?= $row["id_customer"]; ?>">Ubah</a>
 		</td>
 		<td>
 			<a href="hapus.php?id_customer=<?= $row["id_customer"]; ?>">Hapus</a>
 		</td>
 		<td><?= $row["nama"]; ?></td>
 		<td><?= $row["Deskripsi"]; ?></td>
 		<td><?= $row["Tipe"]; ?></td>
 		<td><img src="img/<?= $row["Gambar"]; ?>" width="50"></td>
 	
 
 	</tr>
 <?php $i++; ?>
<?php endforeach; ?>

 </table>
 </body>
 </html>