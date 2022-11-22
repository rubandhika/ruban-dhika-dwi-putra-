<?php 
session_start();
require '../function.php';


if(isset($_POST["submit"])){
    if(tambahProduk($_POST) > 0){
    echo "
        <script type='text/javascript'>
            alert('Data produk berhasil ditambahkan');
            window.location = 'produk.php';
        </script>
    ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data produk gagal ditambahkan');
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
    <title>tambah produk</title>
</head>
<body>
    <div class="main">
        <div class="box">
            <h3>Tambah Data produk</h3>
        
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="nama_produk">nama produk</label> 
                <input type="text" name="nama_produk" id="nama_produk" class="form-control"> <br>
        
                <label for="harga">harga</label> 
                <input type="text" name="harga" id="harga" class="form-control"><br>
        
                <label for="deskripsi">deskripsi</label> 
                <input type="text" name="deskripsi" id="deskripsi" class="form-control"><br>

                <label for="foto">foto</label> 
                <input type="file" name="foto" id="foto" class="form-control">
    
                <button type="submit" name="submit">Tambah</button>
            </form>
        </div>
    </div>
</body>
</html>
