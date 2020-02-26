  <?php 

    // koneksi ke database
    $dbh='localhost';
    $dbus='root';
    $dbn='phpdasar';
    $dbp='';
    
    $conn = mysqli_connect($dbh, $dbus, $dbp, $dbn);
    

    function query($a){

        global $conn;
        $result = mysqli_query($conn, $a);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row; 
        }
        return $rows;
    }

    function tambah($data){
        global $conn;
        // htmlspecialchars untuk membaca baris html yang menganggu
        $nrp = htmlspecialchars($data["nama"]);
        $nama = htmlspecialchars($data["nrp"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $gambar = htmlspecialchars($data["gambar"]);  

        $query = "INSERT INTO mahasiswa
                    VALUES
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                ";
                mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);

    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
?> 