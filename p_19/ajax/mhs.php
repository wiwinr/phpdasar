<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM mahasiswa
     WHERE
        nama LIKE '%$keyword%' OR
        nrp LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%' OR
        email LIKE '%$keyword%'
        -- //%persen ini digunakan untuk mencari sesuatu secara flexsible
    ";
$mahasiswa = query($query);


?>
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