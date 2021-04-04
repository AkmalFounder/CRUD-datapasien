<?php

//koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "","phpdasar");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;

	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data["nama"]);
	$Deskripsi = htmlspecialchars($data["Deskripsi"]);
	$Tipe = htmlspecialchars($data["Tipe"]);
	//$Jumlah = htmlspecialchars($data["Jumlah"]);
	//$Gambar = htmlspecialchars($data["Gambar"]);

	//upload gambar
	$Gambar = upload();
	if( !$Gambar ) {
			return false;
	}

	$query = "INSERT INTO dataobat VALUES ('', '$nama','$Deskripsi','$Tipe','$Gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload(){

	$namaFile = $_FILES['Gambar']['name'];
	$ukuranFile = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
			alert('pilih Gambar terlebih dahulu!');
			</script>";

	return false;
	}

	// cek apakah yg diupload gambar atau bukan
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "<script>
			alert('yang anda upload bukan Gambar!');
			</script>";
		return false;
	}

	// cek ukuran Gambar
	if($ukuranFile > 1000000){
		echo "<script>
			alert('Ukuran Gambarnya terlalu besar!');
			</script>";
		return false;
	}

	// lolos cek, Gambar siap diupload :D
	move_uploaded_file($tmpName,'img/' . $namaFile);

	return $namaFile;	
}


function hapus($id_customer){
	global $conn;
	mysqli_query($conn, "DELETE FROM dataobat WHERE id_customer = $id_customer");

	return mysqli_affected_rows($conn);

}


function ubah($data){
	global $conn;

	// ambil data dari tiap elemen dalam form
	$id_customer = $data["id_customer"];
	$nama = htmlspecialchars($data["nama"]);
	$Deskripsi = htmlspecialchars($data["Deskripsi"]);
	$Tipe = htmlspecialchars($data["Tipe"]);
	$Jumlah = htmlspecialchars($data["Jumlah"]);
	$Gambar = htmlspecialchars($data["Gambar"]);

	$query = "UPDATE dataobat SET 
					nama = '$nama',
					Deskripsi = '$Deskripsi',
					Tipe = '$Tipe',
					Jumlah = '$Jumlah',
					Gambar = '$Gambar'
				WHERE id_customer = $id_customer";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}	




function cari($keyword){
	$query = "SELECT * FROM dataobat WHERE nama LIKE '%$keyword%' OR
		Deskripsi LIKE '%$keyword%' OR
		Tipe LIKE '%$keyword%' OR
		Jumlah LIKE'%$keyword%' OR
		Gambar LIKE '%$keyword%'";

	return query($query);
}


 
?>