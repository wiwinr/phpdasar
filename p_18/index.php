<?php
session_start();

if( !isset ($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'functions.php';
//paginationf
//konfigurasi
$jumlahdataperhalaman = 6;
$jumlahdata= count(query("SELECT * FROM mahasiswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);

$halamanaktif = $_GET["halaman"];
var_dump($halamanaktif);

 $mahasiswa= query ("SELECT * FROM mahasiswa LIMIT 0, $jumlahdataperhalaman"); //tampilkan n data mulai dari indek(kanan) ke a
 
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
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian!" autocomplete="off">
    <button type="submit"  name="cari">Cari!</button>
</form>
<br>
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
        <?= $i++; ?>
    <?php endforeach; ?>
    </table>
</body>
</html>