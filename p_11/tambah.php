<?php
//koneksi ke DBMS
require 'functions.php';

 //cek apakah tombol submit sudah ditekan atau blm?
 if( isset($_POST["submit"]) ) {
        //cek apakah dataa berhasil ditambahkan atau tidak
        if(tambah($_POST)>0){
            echo "
                <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
                </script>
            ";
        }else{
            echo "
                <script>
                alert('data gagal ditambahkan!');
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
    <H1>tambah data mahasiswa</H1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nrp"> NRP: </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="nama"> NAMA: </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email"> EMAIL: </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan"> Jurusan: </label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar"> Gambar: </label>
                <input type="text" name="gambar" id="gambar">
            </li>
                <button type="submit" name="submit">Tambah data</button>
            </li>
        </ul>
    </form>
</body>
</html>