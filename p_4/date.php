<?php
// date
//    echo date("l, d M-Y");

// Time
// UNIX Timesstamp / EPOCH time
// detik yang sudah berlalu sejak 1 januari 1970
// echo time();

// echo date("l", time()+60*60*24*100);

//mktime
//membuat detik yang sudah berlalu
// mktime(0,0,0,0,0,0);
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l", mktime(0,0,0,9,14,1994));

//strtotime
echo date("l", strtotime("25 aug 1985"));

?>