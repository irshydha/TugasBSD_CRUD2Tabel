<?php
include 'config.php';

$id = (int) $_GET['id'];
$sql = "SELECT * FROM produk INNER JOIN buku ON produk.id_produk=buku.id_produk WHERE produk.id_produk='$id'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
    <label for="nama_produk">Nama Produk</label>
    <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>">
<br>
    <label for="jenis_produk">Jenis Produk</label>
    <input type="text" name="jenis_produk"  value="<?= $data['jenis_produk'] ?>">
<br>
    <label for="nama_barang">Nama Barang</label>
    <input type="text" name="nama_barang"  value="<?= $data['nama_buku'] ?>">
<br>
    <label for="penulis">Penulis</label>
    <input type="text" name="penulis"  value="<?= $data['penulis'] ?>">
<br>
    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit"  value="<?= $data['penerbit'] ?>">
<br>
    <label for="harga">Harga</label>
    <input type="text" name="harga"  value="<?= $data['harga_produk'] ?>">
<br>
   
<input type="submit" value="Simpan">

</form>


<?php 
if ($_POST) {
    $sql = "UPDATE produk SET nama_produk= '{$_POST['nama_produk']}}', 
                                 jenis_produk= '{$_POST['jenis_produk']}',
                                 harga= '{$_POST['harga']}'
                                 WHERE id_produk= '{$_POST['id']}'";

    $query = mysqli_query($koneksi, $sql);

    $sql = "UPDATE buku SET nama_buku='{$_POST['nama_barang']}',
                            penulis='{$_POST['penulis']}',
                            penerbit='{$_POST['penerbit']}' WHERE id_produk='{$_POST['id']}'";

    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "Data berhasil diubah";
        header('Location: index.php');
    } else {
        echo "Data gagal diubah: ".mysqli_error();
    }
}

?>