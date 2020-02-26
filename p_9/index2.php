<?php
// koneksi ke database
$dbh='localhost';
$dbus='root';
$dbn='phpdasar';
$dbp='';

$conn = mysqli_connect($dbh, $dbus, $dbp, $dbn);

//ambil data dari data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

//ambil data (fetch) dari object result
//ada empat cara ambil data di mysqli
//1. mysqli_fetch_row() //mengembalikan array numerik
//2.mysqli_fetch_assoc() //mengembalikan array associativ
//3.mysqli_fetch_array() //mengembalikan  keduanya
//4.mysqli_fetch_object() // 
// while($mhs = mysqli_fetch_assoc($result)){
// var_dump($mhs);
// }
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
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
    <?php $i=1; ?>
    <?php while($sql = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $i;  ?></td>
            <td>
                <a href="">Ubah</a>
                <a href="">Hapus</a>
            </td>
            <td><img src="img/<?php echo $sql["gambar"]; ?>"  width="90"></td>
            <td><?php echo $sql["nrp"]; ?></td>
            <td><?php echo $sql["nama"]; ?></td>
            <td><?php echo $sql["email"]; ?></td>
            <td><?php echo $sql["jurusan"]; ?></td>
        </tr>
        <?= $i++; ?>
        <?php endwhile ?>
    </table>
</body>
</html>