<?php 

$koneksi = mysqli_connect("localhost", "root", "", "web_toko");

if (mysqli_connect_errno()) {
	echo "Koneksi gagal: ".mysqli_error();
}

 ?>