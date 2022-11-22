<?php
session_start();

require '../function.php';

$produk = query("SELECT * FROM produk");

?>
<?php require '../layout/sidebar.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN PRODUK</title>
</head>
<body>
    <div class="main">
        <h3>Data produk</h3>
        <a href="tambah-produk.php" class="tambah">Tambah produk</a>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>no</td>
                <td>nama produk</td>
                <td>harga</td>
                <td>deskripsi</td>
                <td>foto</td>
                <td>aksi</td>
            </tr>
    
            
            <?php $i = 1; ?>
            <?php foreach($produk as $data) : ?>
                <tr>
                    <td><?= $i ;?></td>
                    <td><?= $data["nama_produk"]; ?></td>
                    <td><?= $data["harga"]; ?></td>
                    <td><?= $data["deskripsi"]; ?></td>
                    <td><img src="../foto/<?= $data["foto"]; ?>" width="80px" alt="foto"></td>
                    <td>
                        <a href="edit-produk.php?id=<?= $data["id_produk"]; ?>" class="edit">edit</i></a>
                        <a href="hapus-produk.php?id=<?= $data["id_produk"]; ?>" class="hapus" onClick="return confirm('anda yakin ingin menghapus data ini ?')">hapus</a>
                    </td>
                </tr>
            <?php $i++ ; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>