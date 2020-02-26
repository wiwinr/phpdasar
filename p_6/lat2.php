<?php 
    // $mahasiswa=[
    //     ["wiwin ristanto", "0223542", "Teknik Informatika", "email"],
    //     ["agus","214464","ipa","emailku"]
    // ];

    //array asosiativ
    //keynya bukan indexs, adalah string yg kita buat sendiri
    $mahasiswa=[
        ["nama"=>"agus ristanto", 
        "nrp"=>"321315",
        "jurusan"=>"ipa",
        "email"=>"agus#gma",
        "gambar"=>"1.jpeg"
        ] ,
        
        ["nama"=>"wiwin ristanto", 
        "nrp"=>"321315",
        "jurusan"=>"ips",
        "email"=>"ipa",
        "gambar"=>"3.jpeg"] 
    ];

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
    <h1>Daftar Mahasiswa</h1></h1>
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>
            <img src="img/<?php echo $mhs["gambar"]; ?>">
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NRP : <?= $mhs["nrp"]; ?></li>
        <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
        <li>Email : <?= $mhs["email"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>