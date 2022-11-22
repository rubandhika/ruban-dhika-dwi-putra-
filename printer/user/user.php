<?php
session_start();
require '../function.php';

$user = query("SELECT * FROM user");



?>

<?php require '../layout/sidebar.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN USER</title>
</head>
<body>
    <div class="main">
        <h3>Data user</h3>
        <a href="tambah-user.php" class="tambah">Tambah user</a>
        <table cellpadding="0"  cellspacing="0">
            <tr>
                <td>no</td>
                <td>username</td>
                <td>nama lengkap</td>
                <td>kelas</td>
                <td>roles</td>
                <td>aksi</td>
            </tr>
    
            <?php $i = 1; ?>
            <?php foreach($user as $data) : ?>
                <tr>
                    <td><?= $i ;?></td>
                    <td><?= $data["username"]; ?></td>
                    <td><?= $data["nama_lengkap"]; ?></td>
                    <td><?= $data["kelas"]; ?></td>
                    <td><?= $data["role"]; ?></td>
                    <td>
                        <a href="edit-user.php?id=<?= $data["id_admin"]; ?>" class="edit">edit</i></a>
                        <a href="hapus-user.php?id=<?= $data["id_admin"]; ?>" class="hapus" onClick="return confirm('anda yakin ingin menghapus data ini ?')">hapus</a>
                    </td>
                </tr>
            <?php $i++ ; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>