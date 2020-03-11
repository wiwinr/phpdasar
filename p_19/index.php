<?php
session_start();

if( !isset ($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'functions.php';
 $mahasiswa= query ("SELECT * FROM mahasiswa");
 
 //tombolcari ditekan maka akan menampilkan hasil pencarian
 if(isset($_POST["cari"])){
     $mahasiswa = cari($_POST["keyword"]);
 }
?> 

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman admin</title>
</head>
<body>
<a href="logout.php">LogOut</a>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Data Mahasiswa</a>
<br></br>

<form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus 
    placeholder="Masukan keyword pencarian!" autocomplete="off" id="keyword">
    <button type="submit"  name="cari" id="tombol-cari">Cari!</button>
</form>
<br>
<div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
    <?php $i=1; ?>
    <?php foreach($mahasiswa as $sql) : ?>
        <tr>
            <td><?= $i;  ?></td>
            <td>
                <a href="ubah.php?id=<?= $sql["id"];?>">Ubah</a>
                <a href="hapus.php?id=<?= $sql["id"]; ?>">Hapus</a>
            </td>
            <td><img src="img/<?php echo $sql["gambar"]; ?>"  width="90"></td>
            <td><?php echo $sql["nama"]; ?></td>
            <td><?php echo $sql["nrp"]; ?></td>
            <td><?php echo $sql["email"]; ?></td>
            <td><?php echo $sql["jurusan"]; ?></td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
    </table>
</div>
    <script src="js/script.js"></script>
</body>
</html>