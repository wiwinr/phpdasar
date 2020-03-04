<?php
session_start();

if( !isset ($_SESSION["login"])){
    header("location: login.php");
    exit;
}
require 'functions.php';
//paginationf
//konfigurasi
$jumlahdataperhalaman = 2;
$jumlahdata= count(query("SELECT * FROM mahasiswa"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = ( isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ;
$awaldata = ($jumlahdataperhalaman  * $halamanaktif) - $jumlahdataperhalaman;
$view = "block"


 $mahasiswa= query ("SELECT * FROM mahasiswa LIMIT $awaldata , $jumlahdataperhalaman"); //tampilkan n data mulai dari indek(kanan) ke a
 
 //tombolcari ditekan maka akan menampilkan hasil pencarian
 if(isset($_POST["cari"])){
     $cari = $_POST["keyword"];
     if ($cari == ""){
         $view = "block";
         //ini munculin pagingnation
     }else{
         //hilangin
        $view = "none";
        $mahasiswa = cari($cari);
     }
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

<!-- navigation -->
<?php if($halamanaktif > 1 ) : ?>
<a href="?halaman=<?= $halamanaktif - 1 ?>">&lt;</a>
<?php endif; ?>
<div style="display:<?php $view ?>">
    <?php for($i = 1; $i <=$jumlahhalaman; $i++ ): ?>
        <?php if( $i == $halamanaktif ) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red; "><?= $i; ?></a>
        <?php else: ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
</div>

<?php if($halamanaktif < $jumlahhalaman ) : ?>
<a href="?halaman=<?= $halamanaktif + 1 ?>">&gt;</a>
<?php endif; ?>

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
    <?php endforeach; ?>
    </table>
</body>
</html>