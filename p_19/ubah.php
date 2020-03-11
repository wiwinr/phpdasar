<?php
session_start();

if( !isset ($_SESSION["login"])){
    header("location: login.php");
    exit;
}
//koneksi ke DBMS
require 'functions.php';

//get id di url
$id = $_GET["id"];
//query data mahasiswa berdasaarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// var_dump($mhs["nama"]);

 //cek apakah tombol submit sudah ditekan atau blm?
 if( isset($_POST["submit"]) ) {
        //cek apakah dataa berhasil diubah atau tidak
        if(ubah($_POST)>0){
            echo "
                <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <H1>Update data mahasiswa BAru</H1>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
        <ul>

            <li>
                <label for="nrp"> NRP: </label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"] ;?>">
            </li>
            <li>
                <label for="nama"> NAMA: </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ;?>">
            </li>
            <li>
                <label for="email"> EMAIL: </label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"] ;?>">
            </li>
            <li>
                <label for="jurusan"> Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ;?>">
            </li>
            <li>
                <label for="gambar"> Gambar: </label><br>
                <img src="img/<?= $mhs['gambar'];?>" width="150"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
                <button type="submit" name="submit">Update data</button>
            </li>
        </ul>
    </form>
</body>
</html>