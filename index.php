<?php
include 'config.php';

$sql = "SELECT * FROM produk INNER JOIN buku ON produk.id_produk=buku.id_produk";
$query = mysqli_query($koneksi, $sql);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB TOKO | CRUD</title>
</head>
<body>
    <a href="tambah.php">Tambah data</a>
    <table cellspacing="0" border="1">
        <tr>
            <th>Nama Produk</th>
            <th>Jenis Produk</th>
            <th>Nama Barang</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Harga</th>
            <th>Kelola</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($query)) {
           ?>
           <tr>
               <td><?php echo $data['nama_produk'] ?></td>
               <td><?php echo $data['jenis_produk'] ?></td>
               <td><?php echo $data['nama_buku'] ?></td>
               <td><?php echo $data['penulis'] ?></td>
               <td><?php echo $data['penerbit'] ?></td>
               <td><?php echo $data['harga_produk'] ?> </td>
               <td><a href="edit.php?id=<?= $data['id_produk'] ?>">Edit </a> | <a href="hapus.php?id=<?= $data['id_produk'] ?>">Hapus </a></td>
           </tr>
        <?php 
        }

        ?>

    </table>
</body>
</html>