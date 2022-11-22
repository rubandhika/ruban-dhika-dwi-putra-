<?php 
session_start();
require '../function.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

if(isset($_POST["submit"])){
    if(editProduk($_POST) > 0){
    echo "
        <script type='text/javascript'>
            alert('Data produk berhasil diubah');
            window.location = 'produk.php';
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data produk gagal diub');
            window.location = 'produk.php';
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
    <title>edit produk</title>
</head>
<body>
    <div class="main">
        <div class="box">

            <h3>edit Data produk</h3>
        
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?= $produk["id_produk"]; ?>">
        
                <label for="nama_produk">Nama produk</label> 
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $produk["nama_produk"]; ?>">
        
                <label for="harga">harga</label> 
                <input type="text" name="harga" id="harga" class="form-control" value="<?= $produk["harga"]; ?>">

                <label for="deskripsi">deskripsi</label> 
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= $produk["deskripsi"]; ?>">
                
                <label for="foto">foto</label> 
                <input type="file" name="foto" id="foto" class="form-control" value="<?= $produk["foto"]; ?>">
        
                <button type="submit" name="submit">edit</button>
            </form>
        </div>
    </div>
</body>
</html>
