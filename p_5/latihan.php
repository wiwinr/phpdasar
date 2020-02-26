<?php
// array
// Variaabel yang dapat menyimpan banyak nilai
 //Elemen pada array dapat berbeda  tipe data
 //pasangan antara key dan value
 //key-nya adalah index, yg dimulai dari 0
// membuat array ada cara lama
 $hari = array("senin","selasa","rabu");
 //cara baru
 $bulan=["januari", "februaru", "maret"];
 $arrl1=[123,"tulisam", false];
 //menampilkan array
 //var_dump() / print_r()

//  var_dump($hari);
//  echo "<br>";
//  print_r($bulan);
// echo "<br>";
 //menampilkan 1 element pada array

//  menambahkan element bru pada array
var_dump ($hari);
$hari[]="kamis";
$hari[]="jum'at";
echo "<br>";
var_dump($hari);

?>