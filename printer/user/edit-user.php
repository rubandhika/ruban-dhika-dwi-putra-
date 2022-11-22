<?php 
session_start();
require '../function.php';

$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE id_admin = '$id'")[0];

if(isset($_POST["submit"])){
    if(editUser($_POST) > 0){
    echo "
        <script type='text/javascript'>
            alert('Data user berhasil diubah');
            window.location = 'user.php';
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data user gagal ditambahkan');
            window.location = 'user.php';
        </script>
    ";
    }
    }   
?>

<?php require '../layout/sidebar.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="box">
            
        <h3>edit Data User</h3>
    
        <form action="" method="POST">
            <input type="hidden" name="id_admin" value="<?= $user["id_admin"]; ?>">

            <label for="username">username</label> 
            <input type="text" name="username" id="username" class="form-control" value="<?= $user["username"]; ?>">
    
            <label for="nama_lengkap">Nama Lengkap</label> 
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user["nama_lengkap"]; ?>">
    
            <label for="kelas">kelas</label> 
            <input type="kelas" name="kelas" id="kelas" class="form-control" value="<?= $user["kelas"]; ?>">

            <label for="password">password</label> 
            <input type="password" name="password" id="password" class="form-control" value="<?= $user["password"]; ?>">

            <label for="role">Roles</label> 
            <select name="role" id="role" class="form-control" value="<?= $user["role"]; ?>">
                <option value="Admin">Admin</option>
                <option value="customer">customer</option>
            </select>
            <button type="submit" name="submit">edit</button>
        </form>
        </div>
    </div>
</body>
</html>
