<?php
require 'koneksi.php';

function query($query){
    global $conn;

    $rows = [];
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
    }

    return $rows;
}


function tambahUser($data){
    global $conn;

    $username = htmlspecialchars($data["username"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $password = htmlspecialchars($data["password"]);
    $role = htmlspecialchars($data["role"]);

    $query = "INSERT INTO user VALUES(NULL,'$username' ,'$nama_lengkap','$kelas','$password','$role')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function editUser($data){
    global $conn;

    $id = htmlspecialchars($data["id_admin"]);
    $username = htmlspecialchars($data["username"]);
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $password = htmlspecialchars($data["password"]);
    $role = htmlspecialchars($data["role"]);

    $query = "UPDATE user SET
    username = '$username',
    nama_lengkap = '$nama_lengkap',
    password = '$password',
    role = '$role' WHERE id_admin = '$id'";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusUser($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM  user WHERE id_admin = '$id'" );
    return mysqli_affected_rows($conn);
}


function tambahProduk($data){
    global $conn;

    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];

    $query = "INSERT INTO produk VALUES(NULL, '$nama_produk', '$harga','$deskripsi','$foto')";
    move_uploaded_file($files, "../foto/". $foto);

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function editProduk($data){
    global $conn;

    $id = htmlspecialchars($data["id_produk"]);
    $nama_produk = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];

    if(empty($foto)){
        $query = "UPDATE produk SET
        nama_produk = '$nama_produk',
        harga = '$harga',
        deskripsi = '$deskripsi' WHERE id_produk = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE produk SET
        nama_produk = '$nama_produk',
        harga = '$harga',
        deskripsi = '$deskripsi',
        foto = '$foto'  WHERE id_produk = '$id'";
        move_uploaded_file($files, "../foto/".$foto);

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function hapusProduk($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id'");
    return mysqli_affected_rows($conn);
}

?>