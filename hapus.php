<?php
require 'functions.php';

$id_customer = $_GET["id_customer"];

if(hapus($id_customer) > 0) {
			echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'index.php';
			</script>";
}else {
			echo "
			<script>
				alert('data gagal dihapus');
				document.location.href = 'index.php';
			</script>";
	}
		


?>