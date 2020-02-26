<?php 

    // koneksi ke database
    $dbh='localhost';
    $dbus='root';
    $dbn='phpdasar';
    $dbp='';
    
    $conn = mysqli_connect($dbh, $dbus, $dbp, $dbn);
    

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row; 
        }
        return $rows;
    }
?>