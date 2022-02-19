<form action="" method="post">
    <label for="nama_produk">Nama Produk</label>
    <input type="text" name="nama_produk">
<br>
    <label for="jenis_produk">Jenis Produk</label>
    <input type="text" name="jenis_produk">
<br>
    <label for="nama_barang">Nama Barang</label>
    <input type="text" name="nama_barang">
<br>
    <label for="penulis">Penulis</label>
    <input type="text" name="penulis">
<br>
    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit"> 
<br>
    <label for="harga">Harga</label>
    <input type="text" name="harga">
<br>
   
<input type="submit" value="Simpan">

</form>

<?php
include 'config.php';
if ($_POST) {
    $sql = "INSERT INTO produk (nama_produk, jenis_produk, harga) VALUES ('{$_POST['nama_produk']}', '{$_POST['jenis_produk']}' , '{$_POST['harga']}')";
    $query = mysqli_query($koneksi, $sql);

    $sql = "SELECT max(id_produk) AS last_id FROM produk LIMIT 1";
    $query = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_array($query);
    $last_id = $data['last_id'];

    $sql = "INSERT INTO buku (id_produk, nama_buku, penulis, penerbit) VALUES ('$last_id', '{$_POST['nama_barang']}', '{$_POST['penulis']}', '{$_POST['penerbit']}')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "Data berhasil disimpan";
        header('Location: index.php');
    } else {
        echo "Data gagal disimpan ";
    }
}
?>